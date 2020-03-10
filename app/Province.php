<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Province
 *
 * @property int $id
 * @property string $province_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereProvinceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Location[] $locations
 */
class Province extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function locations() {
        return $this->hasMany(Location::class);
    }
}
