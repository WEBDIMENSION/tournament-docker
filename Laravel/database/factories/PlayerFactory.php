<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Player;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
            'event_id' => '1',
            'player_id' => 'J'.rand(1000,9999),
            'player_name' => $faker->Name,
            'player_city' => $faker->prefecture,
            'player_seed' => $faker->randomElement(['1', '0']),
            'player_data_3' => $faker->sentence($nbWords = 2, $variableNbWords = true) ,
            'player_data_4' => '',
            'player_data_5' => '',
            'player_tooltip_1' => $faker->lastName.'テニススクール',
            'player_tooltip_2' => '',
            'player_tooltip_3' => '',
            'player_tooltip_4' => '',
            'player_tooltip_5' => '',
            'partner_id' => 'J'.rand(1000,9999),
            'partner_name' => $faker->Name,
            'partner_city' => $faker->prefecture,
            'partner_seed' => $faker->randomElement(['1', '0']),
            'partner_data_3' => $faker->sentence($nbWords = 2, $variableNbWords = true),
            'partner_data_4' =>'',
            'partner_data_5' => '',
            'partner_tooltip_1' => $faker->lastName.'テニススクール',
            'partner_tooltip_2' => '',
            'partner_tooltip_3' => '',
            'partner_tooltip_4' => '',
            'partner_tooltip_5' => '',
    ];
});
