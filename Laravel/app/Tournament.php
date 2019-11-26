<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events;
use App\Player;

class Tournament extends Model
{
    //
//    public function makeTournament($event_id)
//    {
//        $players = Player::where('event_id', $event_id)->get();
//        foreach ($players as $player) {
//           echo $player->player_name;
//        }
//    }
    public function players()
    {
        return $this->hasMany('\App\Player', 'id', 'player_a_id');
    }
}
