<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table("users")->insert([
            'name' => 'garaccii',
            'email' => 'garaccii@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        factory(App\User::class, 10)->create();
        // Cups Table
        DB::table("cups")->insert([
            'user_id' => '1',
            'cup_name' => 'Cup_001',
            'cup_number' => rand(10000000, 99999999),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("cups")->insert([
            'user_id' => '2',
            'cup_name' => 'Cup_002',
            'cup_number' => rand(10000000, 99999999),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("cups")->insert([
            'user_id' => '3',
            'cup_name' => 'Cup_003',
            'cup_number' => rand(10000000, 99999999),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("cups")->insert([
            'user_id' => '4',
            'cup_name' => 'Cup_004',
            'cup_number' => rand(10000000, 99999999),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("cups")->insert([
            'user_id' => '5',
            'cup_name' => 'Cup_005',
            'cup_number' => rand(10000000, 99999999),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Events Table
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '男子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '男子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '男子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '男子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '女子10才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '女子12才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '女子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '女子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '女子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '1',
            'event_name' => '女子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'type' => '1',
            'players_count' => '16',
            'set_count' => '3',
            'rule' => '4',
            'tiebreak' => '5',
            'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '男子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '男子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '男子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '男子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '女子10才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '女子12才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '女子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '女子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '女子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '2',
            'event_name' => '女子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '男子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '男子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '男子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '男子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '女子10才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '女子12才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '女子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '女子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '女子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '3',
            'event_name' => '女子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '男子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '男子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '男子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '男子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '女子10才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '女子12才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '女子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '女子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '女子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '4',
            'event_name' => '女子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '男子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '男子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '男子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '男子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '女子10才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '女子12才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '女子14才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '女子16才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '女子18才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table("events")->insert([
            'cup_id' => '5',
            'event_name' => '女子20才以下シングルス',
            'event_number' => rand(10000000, 99999999),'tournament' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //players
        factory(App\Player::class, 16)->create();
    }
}
