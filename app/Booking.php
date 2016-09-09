<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 *
 * Represents a single booking made by a user for a specific movie session.
 *
 * id (PK)
 * session_id (FK references movie_sessions.id)
 * user_id (FK references users.id)
 * amount
 * type
 *
 * @package App
 */
class Booking extends Model
{
    protected $fillable = [
        'session_id', 'user_id', 'amount', 'type',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function session()
    {
        return $this->belongsTo('App\MovieSession');
    }
}
