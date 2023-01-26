<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskControl extends Controller
{
    //
    public function show(){
        $tasks = Tasks::all();
        return view('index')->with('tasks', $tasks);
    }
    public function addTask(Request $request){
        if($id = $request->input('id')){
            $task = Tasks::find($id);
            $task->task = $request->input('task');
            $task->finished = false;
            $task->save();
            return redirect('/')->with('success', 'Task Updated');
        }
        $newTask = new Tasks();
        $newTask->task = $request->input('task');
        $newTask->finished = false;
        $newTask->save();
        return redirect('/');
    }
    public function finishTask($id){
        $task = Tasks::find($id);
        $task->finished = true;
        $task->save(); 
        return redirect('/')->with('success', 'Task Finished');
    }

    public function updateTask($id){
        $task = Tasks::find($id);
        return redirect('/')->with('task', $task);
    }

    public function deleteTask($id){
        $task = Tasks::find($id);
        $task->delete();
        return redirect('/')->with('success', 'Task Deleted');
    }
}
