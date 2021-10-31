<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GenreSerie extends Model
{
    use HasFactory;

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);

    }

}
