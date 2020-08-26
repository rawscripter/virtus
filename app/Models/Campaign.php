<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    public $fillable = ['name', 'list_id'];

    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'owner_campaigns', 'campaign_id', 'owner_id');
    }
}
