<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $table = 'tasks';
    protected $casts = [
        'created_at' => 'datetime:M d, Y @ h:i:s A',
        'updated_at' => 'datetime:M d, Y @ h:i:s A',
        'due_date' => 'datetime:M d, Y @ h:i:s A',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'creator', 'assignee', 'due_date', 'completed'
    ];
}
