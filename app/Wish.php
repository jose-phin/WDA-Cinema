<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Wish
 *
 * Represents a single item in a user's wish list. Each wish list item is associated with both a user, and a movie (the actual "wish")
 *
 * id (PK)
 * user_id (FK references users.id)
 * movie_id (FK references movies.id)
 *
 * @package App
 */
class Wish extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function movie() {
        return $this->belongsTo('App\Movie');
    }
}
