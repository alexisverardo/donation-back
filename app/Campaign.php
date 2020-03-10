<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'blood_type_id',
        'qty_donants',
        'path_dni',
        'date_donations',
        'hospital_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function bloods() {
        return $this->belongsToMany(BloodType::class);
    }

    public function campaignDates() {
        return $this->hasMany(CampaignDate::class);
    }

    public function hospital() {
        return $this->belongsTo(Hospital::class);
    }
}
