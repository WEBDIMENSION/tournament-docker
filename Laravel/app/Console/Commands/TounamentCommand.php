<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Player;
use App\Tournament;

class TounamentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tournament {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Tournament';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $event_id = $this->argument("id");
        Tournament::truncate();
        $players = Player::where('event_id', $event_id)->get();
        $player_count = count($players);
        $round_array = [];
        do {
            $player_count = $player_count / 2;
            $round_array[] = $player_count;
        } while ($player_count >= 2);
//        var_dump($round_array);
        for ($i = 0; $i < count($round_array); $i++) {
            $card_cnt = 0;
//            echo $round_array[$i]."\n";
            if ($i === 0) {
                for ($j = 0; $j < count($players); $j = $j + 2) {
                    echo $players[$j]->player_name . "\n";
                    $card_cnt++;
                    $card = new Tournament();
                    $card->event_id = $event_id;
                    $card->round = $i + 1;
                    $card->card_number = $card_cnt;
                    $card->player_a_id = $players[$j]->id;
                    $card->player_b_id = $players[$j + 1]->id;
                    $card->player_a_name = $players[$j]->player_name . ' : ' . $players[$j]->partner_name;
                    $card->player_b_name = $players[$j + 1]->player_name . ' : ' . $players[$j + 1]->partner_name;
                    $card->save();
                }
            } else {
                for ($j = 0; $j < $round_array[$i]; $j++) {
                    $card_cnt++;
                    $card = new Tournament();
                    $card->event_id = $event_id;
                    $card->round = $i + 1;
                    $card->card_number = $card_cnt;
                    $card->save();
                }
            }
        }
    }
}
