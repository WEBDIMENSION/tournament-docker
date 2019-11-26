<?php

namespace App\Http\Controllers\Api;

use App\Score\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->api = new Api();

//        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getTournaments(Request $request)
    {
//        return $scoreApi->
        return $this->api->getTournaments($request);

//        return response()->json(['name' => $eventId, 'gender' => '男','mail' => 'yamada@test.com']);
//        return response()->json(['name' => 'aaa', 'gender' => '男','mail' => 'yamada@test.com']);
//       return $cup_number;
    }

    public function getTournament(Request $request)
    {
        return $this->api->getTournament($request->tournament_id);
    }

    public function postTournament(Request $request)
    {
        return $this->api->postTournament($request);
    }
}
