<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Task;
use Illuminate\Http\Request;
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

    public function getInsertForm()
    {
        return view('insert');
    }

    public function insertTask(Request $request)
    {
        $ownerName = $request->input('owner');
        $taskContent = $request->input('name');

        $owner = Owner::where('owner_name', '=', $ownerName)->first();

        if(!$owner) {
            $owner = new Owner();
            $owner->owner_name = $ownerName;
            $owner->email = $ownerName . "@gmail.com";
            $owner->save();
        }

        $newTask = new Task();
        $newTask->name = $taskContent;
        $newTask->owner_id = $owner->id;

        $newTask->save();

        return redirect()->route('select-all-tasks');
    }

    public function selectTask($id)
    {
        $task = Task::find($id);
        return view('select', ['task' => $task]);
    }

    public function selectAllTasks()
    {
        $tasks = Task::all();
        return view('select-all', ['tasks' => $tasks]);
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('select-all-tasks');
    }

    public function getUpdateForm($id)
    {
        $task = Task::find($id);
        return view('update', ['task' => $task]);
    }

    public function updateTask(Request $request)
    {
        $id = $request->input('id', false);
        $taskName = $request->input('name', false);
        $owner = $request->input('owner', false);

        if($id) {
            $existingOwner = Owner::where('owner_name', '=', $owner)->first();
            if($existingOwner) {
                $task = Task::find($id);
                $task->name = $taskName;
                $task->owner_id = $existingOwner->id;
                $task->update();
            } else {
                return redirect()->route('insert-form');
            }
        }

        return redirect()->route('select-all-tasks');
    }
}
