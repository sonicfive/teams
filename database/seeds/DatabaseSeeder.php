<?php

use Illuminate\Database\Seeder;
use \App\Player as Player;
use \App\Team as Team;
use \App\Stats as Stats;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class, 4)->create()->each(function ($team) {
            $players = factory(Player::class, 4)->make();
            $team->players()->saveMany($players);
            $team->players->each(function($player){
                $player->stats()->save(factory(Stats::class)->make());
            });
        });
    }

    public function down(){
        Team::truncate();
        Player::truncate();
        Stats::truncate();
    }
}
