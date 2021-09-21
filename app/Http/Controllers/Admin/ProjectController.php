<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Category;
use App\Services\Perform;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectImageRequest;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('categoryExist');
    }

    public function index()
    {
        $projects = Perform::index(Project::class, 'category', true);

        return view('admin.portfolio.projects.index', compact(['projects']));
    }

    public function create()
    {
        $categories = Perform::index(Category::class, null, true);

        return view('admin.portfolio.projects.create', compact(['categories']));
    }

    public function store(ProjectRequest $request)
    {
        Perform::createOrUpdate(Project::class, $request);

        return redirect()->route('portfolio.projects.index')->with(['success' => 'Add added successfully']);
    }

    public function edit($id)
    {
        $project = Perform::findFirstOrFail(Project::class, $id, 'images');

        $categories = Perform::index(Category::class, null, true);

        return view('admin.portfolio.projects.edit', compact(['project', 'categories']));
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

    public function storeImages(ProjectImageRequest $request, $id)
    {

        $Project = Perform::findFirstOrFail(Project::class, $id);

        $request['project_id'] = $Project->id;

        Perform::createOrUpdate(ProjectImage::class, $request);

        return redirect()->route('portfolio.projects.edit', $Project->id)->with(['success' => 'Image added successfully']);
    }

    public function deleteImages($pid, $id)
    {
        $Project = Perform::findFirstOrFail(Project::class, $pid);

        $image = ProjectImage::where('id', $id)->where('project_id', $Project->id)->firstOrFail();

        $image->delete();

        return redirect()->route('portfolio.projects.edit', $Project->id)->with(['success' => 'Image has been deleted.']);
    }

    public function destroyImages(Request $request, $id)
    {
        $Project = Perform::findFirstOrFail(Project::class, $id);

        foreach ($request->ids as $id) {

            $image = ProjectImage::where('id', $id)->where('project_id', $Project->id)->firstOrFail();

            $image->delete();
        }

        return redirect()->route('portfolio.projects.edit', $Project->id)->with(['success' => 'Images has been deleted.']);
    }
}
