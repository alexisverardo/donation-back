<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignDate extends Model
{
    protected $fillable = [
        'initDate',
        'endDate',
        'campaign_id'
    ];

    public function campaigns() {
        return $this->belongsTo(Campaign::class);
    }

}
