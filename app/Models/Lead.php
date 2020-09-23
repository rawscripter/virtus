<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;
    protected $table = 'leads';
    protected $casts = [
        'created_at' => 'datetime:M d, Y @ h:i:s A',
        'updated_at' => 'datetime:M d, Y @ h:i:s A',
        'follow_up_date' => 'datetime:M d, Y @ h:i:s A',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

}
