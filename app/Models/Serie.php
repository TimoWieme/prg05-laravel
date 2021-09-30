<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
