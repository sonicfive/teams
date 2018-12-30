<?php

use Illuminate\Database\Seeder;
use \App\Player as Player;
use \App\Team as Team;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 3)->create()->each(function ($team) {
            for($i=1; $i<=3; $i++){
                $players[] = factory(\App\Player::class)->make();
            }
            $team->players()->saveMany($players);
        });
    }

    public function down(){
        Team::truncate();
        Player::truncate();
    }
}
