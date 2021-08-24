<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Contact;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if($request->filter != ''){
            $projects = Project::where('status', $request->filter)->with('contacts')->get();
        } else {
            $projects = Project::all()->load('contacts');
        }

        return response()->json($projects);
    }

    
    public function create()
    {
        return view('create');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = new Project;

        $project->title = $request->title;
        $project->description = $request->description;
        $project->status = "fejlesztésre vár";

        $project->save();

        $names = $request->get('names');
        $emails = $request->get('emails');
        
        if($names = $request->get('names')){
            foreach($names as $i => $name) {
                $contacts[] = new Contact([
                    'name' => $name,
                    'email' => $emails[$i]
                ]);
            }

            $project->contacts()->saveMany($contacts);
        }

        return redirect('/');
    }

    public function edit(Project $project)
    {
        $project = $project->load('contacts');

        return view('edit', compact('project'));
    }

    public function update(StoreProjectRequest $request, Project $project,)
    {
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $names = $request->get('names');
        $emails = $request->get('emails');
        $ids = $request->get('ids');

        if($ids = $request->get('ids')){
            foreach($ids as $i => $id) {
                Contact::where('id', $id)->update(['name' => $names[$i], 'email' => $emails[$i]]);
            }
        }

        return redirect('/');
    }

    public function destroy(Project $project)
    {
        $project->contacts()->delete();
        $project->delete();

        return response()->json(['success' => 'A projekt sikeresen torolve']);
    }
}
