<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    public $fillable = ['first_name', 'last_name', 'mailing_address', 'mailing_city', 'mailing_state', 'mailing_zip'];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'owner_campaigns', 'owner_id', 'campaign_id');
    }

    public function phones()
    {
        return $this->belongsToMany(Phone::class, 'owner_phones', 'owner_id', 'phone_id');
    }

       public function propertyAddresses(){
           return $this->belongsToMany(PropertyAddress::class, 'owner_property_addresses', 'owner_id', 'property_address_id');
   }
}
