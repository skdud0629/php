<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 10)->create();
      /*  User::create([
            'name' => sprintf('User %s %s', rand(1, 100), Str::random(5)),
            'email' => Str::random(10) . '@example.com',

            'password' => bcrypt('password'),
        ]);*/
    }
}
