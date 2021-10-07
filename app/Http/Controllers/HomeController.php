<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function test()
    {
        $names = [
            0 => 'Dominik',
            1 => 'Mato',
            2 => 'Peter',
            3 => 'Michal',
            4 => 'Ondrej',
            5 => 'Richard'
        ];

        foreach ($names as $key => $name) {
            echo $name . "<br>";
        }
    }


    public function insert()
    {
        $task = new Task();
        $task->name = "Vyniest smeti";
        $task->owner = "Dominik";
        $task->save();

        var_dump($task);
    }

    public function select()
    {
        $task = Task::where('owner', '=', 'Dominik')->get();
        foreach ($task as $t) {
            echo $t->id . "<br>";
        }

    }
}
