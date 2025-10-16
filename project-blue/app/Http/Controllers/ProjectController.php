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

    public function create(Request $request)
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

    public function edit(Project $project, string $id)
    {

        $project =  Project::find($id);
        if($project){
            $users = User::all();
            return view('project.edit',compact('project','users'));
        }
        else{
             session()->flash('warning','No se encuentra el registro solicitado');
              return redirect()->route('project.index');
        }
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        session()->flash('success','Registro actualizado exitosamente');

        return redirect()->route('projects.index');
    }

    public function destroy(Request $request, Project $project)
    {
        $project->delete();
         session()->flash('success','Registro eliminado exitosamente');
        return redirect()->route('projects.index');
    }
}
