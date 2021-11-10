<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OwnerAddress extends Pivot
{

    protected $table = 'owner_property_addresses';

    protected $fillable= ['owner_id, property_address_id'];
}
