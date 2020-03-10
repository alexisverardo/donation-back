<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Donor
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $phone
 * @property string $birthday
 * @property string $genre
 * @property int $location_id
 * @property int $blood_type_id
 * @property string|null $last_date_donation
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\BloodType $blood_type
 * @property-read \App\Location $location
 * @property-read \App\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereBloodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereLastDateDonation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Donor whereUserId($value)
 * @mixin \Eloquent
 */
class Donor extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'genre',
        'phone',
        'location_id',
        'birthday',
        'last_date_donation',
        'blood_type_id',
        'user_id',
    ];

    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
