<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Serie
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property int|null $year
 * @property int|null $seasons
 * @property int|null $episodes
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favorite[] $favorite
 * @property-read int|null $favorite_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres
 * @property-read int|null $genres_count
 * @method static \Illuminate\Database\Eloquent\Builder|Serie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Serie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Serie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereEpisodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereSeasons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereYear($value)
 * @mixin \Eloquent
 */
class Serie extends Model
{
    use HasFactory;
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['genre'] ?? false, function ($query, $genre) {
            //select all from genre_serie and join the series on genre_serie.serie_id=series.id
            $query
                ->select('*')
                ->from('genre_serie')
                ->join('series', 'genre_serie.genre_id', '=', 'series.id')
                ->where('genre_serie.genre_id', '=', $genre);

        });
    }
    public function genres() : BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
