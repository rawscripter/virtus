<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAddress extends Model
{
    //
    protected $table = 'property_addresses';

    public $fillable = ['property_address', 'property_city', 'property_zip', 'property_state'];



    public function owners(){
        return $this->belongsToMany(Owner::class, 'owner_property_addresses', 'property_address_id', 'owner_id');
    }


    public function details()
    {
        return $this->hasOne(PropertyDetail::class);
    }
}
