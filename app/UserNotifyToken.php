<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserNotifyToken
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserNotifyToken whereUserId($value)
 * @mixin \Eloquent
 */
class UserNotifyToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
