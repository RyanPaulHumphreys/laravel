<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Group;
use App\Models\Image;
use App\Models\RecoveryInformation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Database\Seeders\Post;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = Group::all();

        //Generates 3 posts (using the post factory) for each user created in the user factory
        User::factory()
            ->count(50)
            ->has((Post::factory()->has(Image::factory())->hasComments(4))->count(3))
            ->has(RecoveryInformation::factory()->count(1))
            ->create();
        
        //Attaches a user to 1-3 random groups, populating the pivot table 
        User::all()->each(function ($user) use ($groups) {
            $user->groups()->attach(
                $groups->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
