<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Image;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $p = new Post;
        $p->content = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu";
        $p->user_id = User::all()->random()->id;
        $p->group_id = 1;
        $p->save();
        Post::factory()->count(150)
            ->has(Comment::factory()->count(rand(2,5)))
            ->has(Image::factory())
            ->create();
    }
}
