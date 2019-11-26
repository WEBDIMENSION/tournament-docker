<?php

namespace App\Http\Controllers;

use App\Cup;
use App\Event;
use App\Player;
use App\Tournament;
use Illuminate\Http\Request;
//use Redis;
use Illuminate\Support\Facades\Redis;

//use Emitter;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cups = Cup::where('user_id', 1)->get();
        return view('home')->with(['cups' => $cups,]);
    }

    public function postScore(Request $request)
    {
        $id = $request->input('id');
        $score = $request->input('score');
        $winner = $request->input('winner');

        $tournament = Tournament::find($id);
        $tournament->score = $score;
        $tournament->winner = $winner;
        $tournament->save();

        $redis = new Redis();
        $redis = Redis::connection();
        $emitter = new \SocketIO\Emitter($redis);
        $winner = Player::where('id', $winner)->get(['player_name', 'partner_name'])->first();
        $data = array(
            'winner' => array($winner->player_name, $winner->partner_name),
            'score' => $score
        );
        $json_data = json_encode($data);
        $emitter->emit('LaravelGetScoreMess', $json_data);
        return redirect('/home');
    }
}
