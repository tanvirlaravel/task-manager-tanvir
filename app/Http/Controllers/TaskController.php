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

    public function store(Request $request)
    {

    $request->validate([
        'title'       => 'required|string|max:25',
        'description' => 'nullable|string',
    ]);

    $isCompleted = $request->has('is_completed') ? true : false;


    Task::create([
        'title'        => $request->title,
        'description'  => $request->description,
        'is_completed' => $isCompleted,
    ]);


    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
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

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted');
    }
}
