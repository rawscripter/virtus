<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerPhone extends Model
{

    protected $table = 'owner_phones';

    public $fillable= ['owner_id, phone_id'];
}
