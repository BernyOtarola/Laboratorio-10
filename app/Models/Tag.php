<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define la relación con el modelo Task
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
