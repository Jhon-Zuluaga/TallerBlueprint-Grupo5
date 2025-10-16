<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $projects = Project::all();

        return view('task.create', [
            'projects' => $projects,
        ]);
    }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());
        session()->flash('success', 'Tarea creada exitosamente');
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $projects = Project::all(); 
        return view('task.edit', [
            'task' => $task,
            'projects' => $projects,
        ]);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        session()->flash('success', 'Tarea actualizada exitosamente');
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        session()->flash('success', 'Tarea eliminada exitosamente');
        return redirect()->route('tasks.index');
    }
}
