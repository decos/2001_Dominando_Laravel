<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $portfolio = [
            ['title' => 'Proyecto #1'],
            ['title' => 'Proyecto #2'],
            ['title' => 'Proyecto #3'],
            ['title' => 'Proyecto #4'],
        ]; */

        // Usar Query Builder
        // $portfolio = DB::table('projects')->get();

        // Usar Eloquent
        // $portfolio = Project::orderBy('created_at', 'DESC')->get();
        // $portfolio = Project::latest('updated_at')->get();

        // Por defecto es 15 páginas
        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    }

    // Route Model Binding
    public function show (Project $project)
    {
        // Cuando retornamos un modelo eloquent, Laravale lo convierte en JSON
        // $project = Project::findOrFail($id);

        // carpeta.fichero
        return view('projects.show', [
            'project' => $project
        ]);

        // De esta forma en la vista show ya tendremos acceso a la variable project
    }

    public function create()
    {
        return view('projects.create');
    }

    // Inyectar la clase `CreateProjectRequest`
    public function store(CreateProjectRequest $request)
    {
        /* Project::create([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description'),
        ]); */

        // En el caso de tener el mismo nombre del campo que recibimos del formulario
        // Project::create(request()->all()); ['_token', 'title', 'url', 'description']

        // Hacer el filtro de los campos que necesitamos almacenar
        // No tendriamos problemas de asignación vacía
        // Project::create(request()->only('titulo', 'url', 'description'));

        // Otra forma de protegernos de la asiganción masiva es validar los campos
        // antes de realizar el almacenamiento

        /* $fields = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);

        Project::create($fields); */
        
        // Usando el Form Request
        Project::create($request->validated());

        return redirect()->route('projects.index');
    }
}
