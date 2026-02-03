<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::truncate();
        League::truncate();
        Team::truncate();
        // User::factory()->create();
        // User::factory(10)->create();
        
        $epl = League::create([
            'name'=>"Premier League",
            'slug'=>"premier-league"
        ]);    

        $laliga = League::create([
            'name'=>"laliga",
            'slug'=>"laliga"
        ]);
        
        Team::create([
            'name'=>"liverpool",
            'slug'=>"liverpool",
            'league_id'=>$epl->id,
        ]);
    
        Team::create([
            'name'=>"barcelona",
            'slug'=>"barcelona",
            'league_id'=>$laliga->id,
        ]);
    }
}
