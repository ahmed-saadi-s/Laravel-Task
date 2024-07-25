<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ad_type',
        'residence_type',
        'budget',
        'availability_date',
        'location_description',
        'country_id',
        'city_id',
        'title',
        'room_size',
        'number_of_rooms',
        'number_of_bathrooms',
        'furnished',
        'smoking_allowed',
        'pets_allowed',
        'contact_email',
        'notes',
        'contact_phone',
        'status',
        'partner_age_min',
        'partner_age_max',
        'partner_gender',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * العلاقة مع جدول المدن
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * العلاقة مع نموذج المستخدم
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
{
    return $this->hasMany(Ad_image::class);
}
public function getFirstImage()
{
    return $this->images()->first();
}
}
