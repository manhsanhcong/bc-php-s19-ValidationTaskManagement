<?php

use Illuminate\Database\Seeder;
use App\Tasks;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Tasks();
        $task->title = 'abc';
        $task->content = 'abc';
        $task->image = ' ';
        $task->due_date = '2018/12/24';
        $task->save();

    }
}
