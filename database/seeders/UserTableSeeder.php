<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $u = new User;
        $u->name = "User 1";
        $u->email = "User1@mailhog.local";
        $u->password = "12345678";
        $u->save();

        User::factory()->count(50)->create();
    }
}
