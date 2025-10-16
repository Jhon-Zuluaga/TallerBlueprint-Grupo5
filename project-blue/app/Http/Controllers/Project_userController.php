<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project_userStoreRequest;
use App\Http\Requests\Project_userUpdateRequest;
use App\Models\ProjectUser;
use App\Models\Project_user;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Project_userController extends Controller
{
    public function index(Request $request): Response
    {
        $projectUsers = ProjectUser::all();

        return view('projectUser.index', [
            'projectUsers' => $projectUsers,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('projectUser.create');
    }

    public function store(Project_userStoreRequest $request): Response
    {
        $projectUser = ProjectUser::create($request->validated());

        $request->session()->flash('projectUser.id', $projectUser->id);

        return redirect()->route('projectUsers.index');
    }

    public function edit(Request $request, Project_user $projectUser): Response
    {
        return view('projectUser.edit', [
            'projectUser' => $projectUser,
        ]);
    }

    public function update(Project_userUpdateRequest $request, Project_user $projectUser): Response
    {
        $projectUser->update($request->validated());

        $request->session()->flash('projectUser.id', $projectUser->id);

        return redirect()->route('projectUsers.index');
    }

    public function destroy(Request $request, Project_user $projectUser): Response
    {
        $projectUser->delete();

        return redirect()->route('projectUsers.index');
    }
}
