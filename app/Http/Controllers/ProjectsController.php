<?php

namespace App\Http\Controllers;

use App\Project;
use App\Services\Twitter;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get(); //select * from projects where owner_id = 4
        
       
        return view('projects.index', compact('projects'));
    }
    
    public function show(Project $project)
    {
        
        
        return view('projects.show', compact('project'));
    }
    
    public function create()
    {
        return view('projects.create');
    }
    
    public function store()
    {
       $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
       
       ]);
       
        Project::create($attributes + ['owner_id' => auth()->id()]);
        
    
        
        return redirect('/projects');
    }
    
    public function edit(Project $project)
    {
      
        return view ('projects.edit', compact('project'));
    }
    
    public function update(Project $project)
    {
        
        $project->update(request(['title', 'description']));
        
        return redirect('/projects');
    }
    
    public function destroy(Project $project)
    {
        $project->delete();
        
        return redirect('/projects');
    }
}


