<?php

namespace App\Score;

use Illuminate\Database\Eloquent\Model;
use App\Cup;
use App\Event;
use App\Player;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class Api
{

    /**
     * @param $userId
     * @return mixed
     */
    public function getEvents($cup_number)
    {
//        echo  Cup::where('id',$userId)->get()->toJson();
        return event::where('cup_number', $cup_number)->get()->toJson();

//        return $this->hasMany('\App\Player','id','player_a_id');
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getTournaments($request)
    {
        $eventInfo = Event::where('event_number', $request->event_number)->get()->first();
//         $tournaments = Tournament::where('event_id', $eventInfo->id)->get()->toJson();
        return Tournament::where('event_id', $eventInfo->id)->get();


//        return Tournament::where('event_number', $request->event_number)->get()->toJson();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function postTournament(Request $request)
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $cupId = $request['cupId'];
        $cupName = $request['cupName'];
        $eventId = $request['eventId'];
        $eventName = $request['eventName'];
        $roundNumber = $request['roundNumber'];
        $cardNumber = $request['cardNumber'];
        $tournamentId = $request['tournamentId'];
        $score = $request['score'];
        $winner = $request['winner'];

        $tournament = Tournament::find($tournamentId);
        $tournament->score = $score;
        $tournament->winner = $winner;
        $tournament->save();
//
        $redis = Redis::connection();
        $emitter = new \SocketIO\Emitter($redis);
        $winner = Player::where('id', $winner)->get(['player_name', 'partner_name'])->first();
        $data = array(
            'cupId' => $cupId,
            'cupName' => $cupName,
            'eventId' => $eventId,
            'eventName' => $eventName,
            'roundNumber' => $roundNumber,
            'cardNumber' => $cardNumber,
            'tournamentId' => $tournamentId,
            'winner' => array($winner->player_name, $winner->partner_name),
            'score' => $score
        );
        $json_data = json_encode($data);
        $emitter->emit('LaravelGetScoreMess', $json_data);
        return $result_json = json_encode(array('result' => true, 'code' => '000'));
    }

    public function getTournament($tournament_id)
    {
        $tournamentId = $tournament_id;
        return Tournament::where('id', $tournamentId)->get()->first()->toJson();
    }
}
