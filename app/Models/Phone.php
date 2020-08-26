<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public $fillable = [
        'phone1_type',
        'phone2_type',
        'phone3_type',
        'phone4_type',
        'phone5_type',
        'phone6_type',
        'phone1',
        'phone2',
        'phone3',
        'phone4',
        'phone5',
        'phone6'
    ];


    /**
     * The roles that belong to the user.
     */
    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'owner_phones', 'phone_id', 'owner_id');
    }
}
