<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        // $tasks = Task::all();
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request, Task $task)
    {
        $request->validate([
            'title'         =>'required|string|max:25',
            'description'   =>'nullable|string'
        ]);

       Task::create([
        'title' => $request->title,
        'description' => $request->description
       ]);

        return redirect()->route('tasks.index');
    }

    function markAsComplete($id)
    {
        // dd($id);
        $task = Task::find($id);
        // dd($task);
        $task->is_completed =true;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task marked as  completed');
    }
}
