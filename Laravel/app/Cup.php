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

    public function events_count()
    {
        return $events_count = Event::where('cup_id', $this->id)->count();
    }

//    public function getCup($cup_number)
//    {
//        return $cup = Cup::where('cup_number',$cup_number)->get()->first();
//    }
}
