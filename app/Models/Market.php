<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    public $fillable = [
        'market',
    ];

    public function propertyAddresses(){
        return $this->belongsToMany(PropertyAddress::class, 'market_properties', 'market_id', 'property_address_id');
    }
}
