<?php

namespace Database\Seeders;

use \App\Models\Club;
use \App\Models\Manager;
use \App\Models\Player;
use \App\Models\User;


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
        Club::truncate();
        Manager::truncate();
        Player::truncate();
        User::truncate();

        $manager = Manager::factory(2)->create();

        $club1 = Club::factory()->create();
        $club2 = Club::factory()->create();

        Player::factory(3)->create([
            'manager_id'=>$manager->first()->id,
            'club_id'=>$club1->first()->id,
        ]);

        Player::factory(2)->create([
            'manager_id'=>$manager->first()->id,
            'club_id'=>$club2->first()->id,
        ]);

        $user = User::factory()->create();
    }
}
