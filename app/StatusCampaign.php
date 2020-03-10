<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCampaign extends Model
{
    protected $table = 'status_campaign';

    protected $fillable = [
        'user_id', 'campaign_id', 'status', 'deleted'
    ];

//    public function campaign() {
//        return $this->hasOne(Campaign::class);
//    }
//    public function user() {
//        return $this->hasOne(User::class);
//    }
}
