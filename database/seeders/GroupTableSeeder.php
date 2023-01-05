<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $g = new Group;
        $g->name = "TestGroup";
        $g->isPrivate = false;
        $g->save();
        Group::factory()->count(15)->create();
    }
}
