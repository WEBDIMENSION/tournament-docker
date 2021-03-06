<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
//    public function makeTournament($event_id)
//    {
//        $players = Player::where('event_id', $event_id)->get();
//        foreach ($players as $player) {
//           echo $player->player_name;
//        }
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany('\App\Player', 'id', 'player_a_id');
    }
}
