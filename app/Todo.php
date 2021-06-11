<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'id', 'task'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    
}
