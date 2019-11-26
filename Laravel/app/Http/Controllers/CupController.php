<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cup;
use App\Event;

class CupController extends Controller
{
    //
    public function events($cup_number)
    {
        $cup = Cup::where('cup_number', $cup_number)->get()->first();

//       $obj = new Cup();
//       $cup = $obj->getCup($cup_number);
//       $cup_number = $request->input('cup_number');
        $events = Event::where('cup_id', $cup->id)->get();
        return view('cup')->with(['cup' => $cup, 'events' => $events,]);
    }
}
