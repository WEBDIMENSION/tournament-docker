<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
 public function scoreEdit(Request $request)
 {
	return response()->json([
		[ 'result' => true ],
	]);
 }
}
