<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tournament;

class Event extends Model
{
    //
    public function getEventName()
    {
        return $this->event_name;
    }

    public function tournaments()
    {
        return $this->hasMany('\App\Tournament');
    }

    public function getRounds($event_id)
    {
        $rounds = Tournament::where('event_id', $event_id)->groupBy('round')->orderBy('round', 'ASC')->get('round');
//        var_dump($rounds);
        return $rounds;
    }

    public function getCardsInRound($event_id, $round)
    {
        $cards = Tournament::where('event_id', $event_id)->where('round', $round)->orderBy('id', 'ASC')->get();
//  var_dump($cards);
        return $cards;
    }

    public function getPlayerName($player_id)
    {
        $ret = [];
        $player_cnt = Player::where('id', $player_id)->count();
        if ($player_cnt) {
            $player = Player::where('id', $player_id)->get()->first();
            $ret[] = ['name' => $player->player_name];
            $ret[] = ['name' => $player->partner_name];
        }
//        if($player) {
//            $ret[] = ['name' => $player->player_name];
//            $ret[] = ['name' => $player->partner_name];
//        }
        return $ret;
    }
}
