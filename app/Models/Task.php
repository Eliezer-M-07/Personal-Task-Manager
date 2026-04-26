<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
#[Fillable([ 
    'title', 
    'description', 
    'due_date', 
    'is_completed', 
    'priority'])
]

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
