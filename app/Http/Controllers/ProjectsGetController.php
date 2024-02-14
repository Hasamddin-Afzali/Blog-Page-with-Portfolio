<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectsGetController extends Controller
{
    public function projects()
    {
        $projects =  Project::where('isDeleted', 0)->orderBy('created_at', 'desc')->get();
        return view('back.projects', compact('projects'));
    }

    public function addNewProject(Request $request)
    {
        Project::create([
            'title' => $request->projectTitle,
            'description' => $request->projectDesc,
            'link' => $request->projectLink,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->back()->with('addProjectSuccess');
    }

    public function editProject(Request $request)
    {
        $project = Project::where('id', $request->id)->get()[0];
        $project->title = $request->projectTitle;
        $project->description = $request->projectDesc;
        $project->link = $request->projectLink;
        $project->updated_by = Auth::user()->id;
        $project->save();
        return redirect()->back()->with('editProjectSuccess');
    }

    public function deleteProject(Request $request)
    {
        $project = Project::where('id', $request->id)->get()[0];
        $project->isDeleted = 1;
        $project->deleted_by = Auth::user()->id;
        $project->save();
        return redirect()->back()->with('deleteProjectSuccess');

}
