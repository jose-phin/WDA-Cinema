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
 * remaining fields are detailed in the $fillable array
 *
 * @package App
 */
class Booking extends Model
{
    protected $fillable = [
        'session_id', 'user_id', 'adult_qty', 'child_qty', 'concession_qty', 'paid',
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
