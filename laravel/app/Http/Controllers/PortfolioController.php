<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
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
        return view('portfolio', [
            'projects' => Project::latest()->paginate(1)
        ]);
    }
}
