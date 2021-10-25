<?php
/**
 * @var \App\Models\Serie $serie
 **/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Favorite
 *
 * @property-read \App\Models\Serie $serie
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite query()
 * @mixin \Eloquent
 */
class Favorite extends Model
{
    protected $fillable = ['user_id', 'serie_id'];

    use HasFactory;

    public function serie()
    {
        return $this->belongsToMany(Serie::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
