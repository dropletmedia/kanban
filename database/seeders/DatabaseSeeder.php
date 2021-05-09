<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tasklist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // first seed the db with the tasklists
        Tasklist::factory()
        ->count(3)
        ->create();

        // then give them the right label
        for ($n = 0; $n <= 2; $n++) {
            $titlearray = ['Todo', 'In progress', 'Complete'];
            $tasklist = Tasklist::find($n+1);
            $tasklist->label = $titlearray[$n];
            $tasklist->save();
        }

    }
}
