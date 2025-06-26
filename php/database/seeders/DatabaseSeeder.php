<?php

namespace Database\Seeders;

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

        if (cojfig('database.default')!=='sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        App\Models\User::truncate();
        $this->call (UsersTableSeeder::class);
        App\Models\Post::truncate();
        $this->call (PostsTableSeeder::class);

        if(config('database.default')!=='sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
