<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BloodType
 *
 * @property int $id
 * @property string $blood_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BloodType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BloodType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BloodType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BloodType whereBloodType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BloodType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BloodType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BloodType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 */
class BloodType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blood_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
       return $this->hasMany(User::class);
    }

    public function campaigns() {
        return $this->belongsToMany('BloodType');
    }
}
