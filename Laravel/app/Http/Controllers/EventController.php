<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Cup;

class EventController extends Controller
{
    //
    public function index($event_number)
    {
        $event = Event::where('event_number', $event_number)->get()->first();
        $cup = Cup::find($event->cup_id);
        return view('event')->with(['event' => $event, 'cup_name' => $cup->cup_name,]);
    }
}
