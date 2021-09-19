<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('admin.portfolio.projects.index', compact(['projects']));
    }

    public function store(ProjectRequest $request)
    {
        Perform::createOrUpdate(Project::class, $request);

        return redirect()->route('portfolio.projects.index')->with(['success' => 'Add added successfully']);
    }

    public function edit($id)
    {
        $project = Perform::findFirstOrFail(Project::class, $id);

        return view('admin.portfolio.projects.index', compact(['project']));
    }

    public function update(ProjectRequest $request, $id)
    {
        Perform::createOrUpdate(Project::class, $request, $id);

        return redirect()->route('portfolio.projects.index')->with(['success' => 'changed updated successfully']);
    }

    public function delete($id)
    {
        $Project = Perform::findFirstOrFail(Project::class, $id);

        $Project->delete();

        return redirect()->route('portfolio.projects.index')->with(['success' => 'Project has been deleted.']);
    }

    public function destroy(Request $request)
    {
        foreach ($request->ids as $id) {

            $Project = Perform::findFirstOrFail(Project::class, $id);

            $Project->delete();
        }

        return redirect()->route('portfolio.projects.index')->with(['success' => 'projects has been deleted.']);
    }
}
