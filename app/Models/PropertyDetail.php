<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    //
    protected $table = 'property_details';

    public $fillable = ['property_address_id','details'];

}
