<?php

namespace App\Score;

use Illuminate\Database\Eloquent\Model;
use App\Cup;

class Score
{
    //
//    public function makeTournament($event_id)
//
//
//    {
//        $players = Player::where('event_id', $event_id)->get();
//        foreach ($players as $player) {
//           echo $player->player_name;
//        }
//    }
    public function getCups($userId)
    {
//        echo  Cup::where('id',$userId)->get()->toJson();
        return  Cup::where('user_id',$userId)->get();

//        return $this->hasMany('\App\Player','id','player_a_id');
    }

    public function getAllCups($json = false)
    {
        if($json){
            return  Cup::get()->toJson();
        }else{
            return  Cup::get();
        }
//        echo  Cup::where('id',$userId)->get()->toJson();

//        return $this->hasMany('\App\Player','id','player_a_id');
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getCup($cup_number)
    {
//        echo  Cup::where('id',$userId)->get()->toJson();
        return  Cup::where('cup_number',$cup_number)->get()->first();

//        return $this->hasMany('\App\Player','id','player_a_id');
    }

}

