<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('project.index', [
            'projects' => $projects,
        
        ]);
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::all();

        return view('project.create',compact('projects','users'));
    }

    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        session()->flash('success','Registro creado exitosamente');

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
       $users = User::all();
        return view('project.edit', compact('project', 'users'));
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        session()->flash('success','Registro actualizado exitosamente');

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
         session()->flash('success','Registro eliminado exitosamente');
        return redirect()->route('projects.index');
    }
}
