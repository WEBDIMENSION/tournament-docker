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
        $this->api = new Api;

//        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getTournament(Request $request){
//        return $scoreApi->
        return $this->api->getTournament($request);

//        return response()->json(['name' => $eventId, 'gender' => '男','mail' => 'yamada@test.com']);
//        return response()->json(['name' => 'aaa', 'gender' => '男','mail' => 'yamada@test.com']);
//       return $cup_number;
    }

    public function getCard(Request $request){
        return $this->api->getCard($request);
    }

    public function postTournament(Request $request){
        return $this->api->postTournament($request);
    }

}