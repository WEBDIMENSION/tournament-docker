<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
    //
    public function events()
    {
        return $this->hasMany('\App\Event');
    }

    /**
     * @return mixed
     */
    public function eventsCount()
    {
        return $events_count = Event::where('cup_id', $this->id)->count();
    }
}
