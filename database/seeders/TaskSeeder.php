<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::limit(2)->orderBy('id')->lazy()->each(function ($user){
            Task::factory(4)->state(['user_id'=>$user->id])->create();
        });
    }
}
