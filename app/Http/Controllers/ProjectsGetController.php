<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectsGetController extends Controller
{
    public function projects()
    {
        try{
            $projects =  Project::where('isDeleted', 0)->orderBy('created_at', 'desc')->paginate(15);
        }catch (\Exception $e){
            $projects = [];
            toastr()->error('Something went wrong! '.$e->getMessage());
        }
            return view('back.projects', compact('projects'));
    }

    public function addNewProject(Request $request)
    {
        $request->validate([
            'projectTitle' => 'required',
            'projectDesc' => 'required',
            'projectLink' => 'required'
        ]);
        try {
            Project::create([
                'title' => $request->projectTitle,
                'description' => $request->projectDesc,
                'link' => $request->projectLink,
                'created_by' => Auth::user()->id,
            ]);
            toastr()->success('Project added successfully.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
        }

        return redirect()->back();
    }

    public function editProject(Request $request)
    {
        $request->validate([
            'projectTitle' => 'required',
            'projectDesc' => 'required',
            'projectLink' => 'required'
        ]);
        try {
            $project = Project::where('id', $request->id)->get()[0];
            $project->title = $request->projectTitle;
            $project->description = $request->projectDesc;
            $project->link = $request->projectLink;
            $project->updated_by = Auth::user()->id;
            $project->save();
            toastr()->success('The change has been implemented.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
        }
        return redirect()->back();
    }

    public function deleteProject(Request $request)
    {
        try {
            $project = Project::where('id', $request->id)->get()[0];
            $project->isDeleted = 1;
            $project->deleted_by = Auth::user()->id;
            $project->save();
            toastr()->success('The project deleted.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
        }
        return redirect()->back();

}
}
