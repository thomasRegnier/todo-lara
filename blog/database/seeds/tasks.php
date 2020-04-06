<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\task;

class tasks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            $task = new task;
            $task->content = $faker->realText(20);

            $task->save();

        }
    }
}
