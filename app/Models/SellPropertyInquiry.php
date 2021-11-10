<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellPropertyInquiry extends Model
{
    use SoftDeletes;

    protected $table = 'sell_property_inquiries';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'condition', 'address', 'city','state','zip','asking_price'
    ];
}
