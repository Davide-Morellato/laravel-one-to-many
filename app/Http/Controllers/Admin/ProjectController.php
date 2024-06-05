<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_project' => 'required|max:150|string',
            'url_github' => 'required|string',
            'description' => 'nullable|string',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $form_data = $request->all();

        //controllo la generazione dello slug,
        //evitando che ci siano errori qualora ce ne sia uno già esistente
        //assegnando al nuovo "-n" (contatore)
        $base_slug = Str::slug($form_data['name_project']);

        $slug = $base_slug;

        $n = 0;

        do{
            $find = Project::where('slug', $slug)->first();

            if($find !== null){
                $n++;
                $slug = $base_slug .'-'. $n;
            }

        }while($find !== null);

        $form_data['slug'] = $slug; //aggiungo all'array associativo in form_data lo slug
        $project = Project::create($form_data);

        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name', 'asc')->get();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name_project' => 'required|max:150|string',
            'slug' => ['required', 'max:255', Rule::unique('projects', 'slug')->ignore($project->id)],
            'url_github' => 'required|string',
            'description' => 'nullable|string',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $form_data = $request->all();

        $project->fill($form_data);

        $project->save();

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return view('admin.projects.index');
    }
}
