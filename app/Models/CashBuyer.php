<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashBuyer extends Model
{
    use SoftDeletes;
    protected $table = 'cashbuyers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'address','city', 'state', 'zip', 'company'
    ];
}
