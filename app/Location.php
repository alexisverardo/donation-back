<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Location
 *
 * @property int $id
 * @property string $location_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereLocationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $province_id
 * @property-read \App\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereProvinceId($value)
 */
class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_name', 'province_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function province() {
       return $this->belongsTo(Province::class);
    }
    public function hospitals() {
        return $this->hasMany(Hospital::class);
    }
}
