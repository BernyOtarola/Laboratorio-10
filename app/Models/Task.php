<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define la relación con el modelo Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
