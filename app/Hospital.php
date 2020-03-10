<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name', 'location_id'
    ];

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function campaign() {
        return $this->hasMany(Campaign::class);
    }
}
