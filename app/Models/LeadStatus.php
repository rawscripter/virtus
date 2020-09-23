<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadStatus extends Model
{
    use SoftDeletes;
    protected $table = 'lead_statuses';
    protected $casts = [
        'created_at' => 'datetime:M d, Y @ h:i:s A',
        'updated_at' => 'datetime:M d, Y @ h:i:s A',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_type',
    ];

}
