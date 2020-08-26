<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JointVenture extends Model
{
    use SoftDeletes;

    protected $table = 'joint_ventures';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'company','phone', 'email', 'condition', 'address', 'city','state','zip','selling_price'
    ];
}
