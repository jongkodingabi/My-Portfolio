<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Contracts\DataTable;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.projectIndex', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.projectCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'description' => 'required',
        ]);

        //Save picture
        $path = $request->file('picture')->store('public/images');

        Project::create([
            'picture' => $path,
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        return redirect()->route('admin.projects.projectIndex')->with('success', 'Succsess added project.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.projectShow', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.projectEdit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'picture'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'description' => 'required',
        ]);


        $path = $request->file('picture')->store('public/images');

       $data = ([
        'picture' => $path,
        'title' => $request->input('title'),
        'description' => $request->input('description')
       ]);

       if ($request->hasFile('picture')){
        if ($project->picture){
            Storage::delete($project->picture);
        }
        $data['picture'] = $request->file('picture')->store('public/images');
       }
       $project->update($data);

        return redirect()->route('admin.projects.projectIndex')->with('success', 'succsesfully added project');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.projectIndex')->with('success', 'success to delete project');
    }
}
