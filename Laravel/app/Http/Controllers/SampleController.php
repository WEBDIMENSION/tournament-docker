<?php

namespace App\Http\Controllers;

use App\Cup;
use App\Event;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    //
    public function index()
    {
        return view('sample')->with([
            'val1' => 'val1',
            'val2' => 'val2'
        ]);
    }
}
