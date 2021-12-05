<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('CMS.menus.index',compact('projects'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:menus,title',
            'description'=>'required',
        ]);
//        dd($request);

        $project = new Project();
        $project ->title=$request->get('title');
        $project ->description=$request->get('description');
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('projects_images/'), $imageName);
            $project ->image=($imageName);
        }
        $project->save();
        session()->flash('project_added');
        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        $allPosts = Post::all();
        $projects = Project::all();
        return view('blog.single',compact('project','allPosts','projects'));
    }

    public function edit(Project $project)
    {
        return view('CMS.menus.edit',compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'=>'required|min:10',
            'description'=>'required|min:50'

        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('projects_images/'), $imageName);
            $project->image=($imageName);
        }
        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->save();
        session()->flash('project_updated');
        return redirect()->route('projects.index');
    }

    public function destroy(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->delete();
        session()->flash('project_deleted');
        return redirect()->route('projects.index');
    }
}
