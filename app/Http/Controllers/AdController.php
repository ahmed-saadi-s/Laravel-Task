<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\City;
use App\Models\Ad;
use App\Models\Ad_image;
use App\Http\Requests\AdRequest;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function adsIndex()
    {
        if (!auth()->check()) {
            $ads = Ad::with('images')->get();
        } else {
            $user = auth()->user();
            if ($user->account_type == 'seeking_roommate') {
                $ads = Ad::with('images')->where('ad_type', 'place')->where('user_id', '!=', $user->id)->get();
            } else {
                $ads = Ad::with('images')->where('ad_type', 'roommate')->where('user_id', '!=', $user->id)->get();
            }
        }
        return view('pages.users.ads', compact('ads'));

    }
    public function show($id)
    {
        $ad = Ad::with('images','country','city','user')->findOrFail($id);

        return view('pages.users.ad-details', compact('ad'));
    }

    public function createAdIndex()
    {
        $countries = Country::all();
        $city = City::find(auth()->user()->city_id);

        return view ('pages.users.createAd',compact('countries','city'));
    }
    public function store(AdRequest $request)
    {
        // التحقق من صحة البيانات

        $validated = $request->validated();



        // حفظ الإعلان
        $ad = new Ad($validated);
        $ad->user_id = auth()->id();
        if(auth()->user()->account_type=='seeking_roommate')
        $ad->ad_type = 'roommate';
        else
        $ad->ad_type = 'place';
        $ad->save();

        // حفظ الصور
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('ads_images'), $imageName);
                $adImage = new Ad_Image();
                $adImage->ad_id = $ad->id;
                $adImage->image_path = 'ads_images/' . $imageName;
                $adImage->save();
            }

        }
        return redirect()->route('ads.create')->with('success', 'Ad created successfully!');
    }
}
