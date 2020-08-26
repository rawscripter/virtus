<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerCampaign extends Model
{

    protected $table = 'owner_campaigns';

    protected $fillable= ['owner_id, campaign_id'];
}
