<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Ad;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        if (auth()->check()) {
            $userId = auth()->id();

            $roommateAds = Ad::where('ad_type', 'roommate')
                ->where('user_id', '!=', $userId)
                ->latest()
                ->take(3)
                ->with('user', 'images')
                ->get()
                ->map(function ($ad) {
                    $ad->image = $ad->getFirstImage();
                    return $ad;
                });

            $placeAds = Ad::where('ad_type', 'place')
                ->where('user_id', '!=', $userId)
                ->latest()
                ->take(3)
                ->with('user', 'images')
                ->get()
                ->map(function ($ad) {
                    $ad->image = $ad->getFirstImage();
                    return $ad;
                });
        } else {
            $roommateAds = Ad::where('ad_type', 'roommate')
                ->latest()
                ->take(3)
                ->with('user', 'images')
                ->get()
                ->map(function ($ad) {
                    $ad->image = $ad->getFirstImage();
                    return $ad;
                });

            $placeAds = Ad::where('ad_type', 'place')
                ->latest()
                ->take(3)
                ->with('user', 'images')
                ->get()
                ->map(function ($ad) {
                    $ad->image = $ad->getFirstImage(); // إضافة الصورة الأولى كمجال جديد
                    return $ad;
                });
        }

        // دمج الإعلانات
        $ads = $roommateAds->concat($placeAds);

        // تمرير البيانات إلى العرض
        return view('pages.users.home', compact('ads'));
    }

    public function registerIndex()
    {
        if (auth()->check()) {
            return redirect('/');
        }
        $countries = Country::all();
        return view('pages.users.register', compact('countries'));
    }

    public function register(UserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'nationality' => $request->nationality,
            'job' => $request->job,
            'account_type' => $request->account_type,
            'birthday' => $request->date_of_birth,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'marital_status' => $request->marital_status,
            'gender' => $request->gender,
        ]);

        auth()->login($user);
        return redirect()->back();
    }



    public function getCitiesByCountry($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities);
    }

    public function loginIndex()
    {
        if (auth()->check()) {
            return redirect('/');
        }
        return view('pages.users.login');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function editProfile()
    {
        $countries = Country::all();
        $city = City::find(auth()->user()->city_id);
        return view('pages.users.edit-profile', compact('countries', 'city'));
    }
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'nationality' => $request->nationality,
            'job' => $request->job,
            'account_type' => $request->account_type,
            'birthday' => $request->date_of_birth,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'marital_status' => $request->marital_status,
            'gender' => $request->gender,
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicture = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $profilePicture);
            $user->profile_picture ='profile_pictures/'.$profilePicture;
            $user->save();
        }

        return redirect()->back()->with('success', 'Your profile has been updated successfully.');
    }
    public function viewProfile($id)
    {
        // جلب بيانات المستخدم من قاعدة البيانات
        $user = User::findOrFail($id);

        // عرض View مع بيانات المستخدم
        return view('pages.users.profile', compact('user'));
    }

}
