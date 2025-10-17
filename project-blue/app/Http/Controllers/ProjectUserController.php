<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project_userStoreRequest;
use App\Http\Requests\Project_userUpdateRequest;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectUserController extends Controller
{
    /**
     * 
     */
    public function index(Request $request): View
    {
        $project_Users = ProjectUser::all();

        return view('projectUser.index', [
            'project_Users' => $project_Users,
        ]);
    }

    /**
     * 
     */
    public function create(): View
    {
        $projects = Project::all();
        $users = User::all();

        return view('projectUser.create', compact('projects', 'users'));
    }

    /**
     * 
     */
    public function store(Project_userStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $exists = ProjectUser::where('project_id', $data['project_id'])
            ->where('user_id', $data['user_id'])
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withErrors(['user_id' => 'Este usuario ya está asignado a este proyecto.'])
                ->withInput();
        }

        ProjectUser::create($data);
        session()->flash('success', 'Proyecto de Usuario creado exitosamente');
        return redirect()->route('project_users.index');
    }

    /**
     *
     */
    public function edit(ProjectUser $project_user): View
    {
        $projects = Project::all();
        $users = User::all();
        return view('projectUser.edit', compact('project_user', 'projects', 'users'));
    }


    /**
     * 
     */
    public function update(Project_userUpdateRequest $request, ProjectUser $project_User): RedirectResponse
    {
        $project_User->update($request->validated());
        session()->flash('success', 'Proyecto de Usuario actualizado exitosamente');
        return redirect()->route('project_users.index');
    }

    /**
     * 
     */
    public function destroy(ProjectUser $project_User): RedirectResponse
    {
        $project_User->delete();

        session()->flash('success', 'Proyecto de Usuario eliminado exitosamente');
        return redirect()->route('project_users.index');
    }
}
