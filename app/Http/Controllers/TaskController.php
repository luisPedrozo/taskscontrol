<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('tasks.index', ['tasks'=>$tasks]);
   
    }

    public function __invoke()
    {
        $events = [];
 
        $tasks = Task::all();
 
        foreach ($tasks as $task) {
            $events[] = [
                'title' => $task->title,
                'start' => $task->start_time,
                'end' => $task->finish_time,
            ];
        }
 
        return view('calendar', compact('events'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.taskCreate');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required',
            'status'=>'required'

        ]);
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success','Nueva tarea agregada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.taskEdit', ['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $request->validate([

            'title'=>'required',
            'status'=>'required'

        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success','Nueva tarea actualizada');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Nueva tarea eliminada');

    }
}
