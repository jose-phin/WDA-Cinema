<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 *
 * A cinema location for Mavericks Inc.
 *
 * id (PK)
 * name
 *
 * @package App
 */
class Location extends Model
{
    public function sessions()
    {
        return $this->hasMany('App\MovieSession');
    }
}
