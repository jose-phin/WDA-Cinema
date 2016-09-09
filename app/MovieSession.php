<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MovieSession
 *
 * Represents a single viewing session for a movie.
 *
 * id (PK)
 * movie_id (FK references movies.id)
 * location_id (FK references locations.id)
 * time (an epoch timestamp)
 * theater (note that this is simply a random int value corresponding to a theater)
 *
 * @package App
 */
class MovieSession extends Model
{
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}
