<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 *
 * Info for a single movie.
 *
 * id (PK)
 * remaining fields are detailed in the $fillable array
 *
 * @package App
 */
class Movie extends Model
{
    protected $fillable = [
        'title', 'director', 'main_cast', 'genre', 'synopsis', 'running_time', 'release_date', 'is_now_showing',
    ];

    public function sessions()
    {
        return $this->hasMany('App\MovieSession');
    }

}
