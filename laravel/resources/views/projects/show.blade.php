@extends('layout')

@section('title', 'Portfolio | ' . $project->title)

@section('content')
    <h1>{{ $project->title }}</h1>

    @auth
        <a href="{{ route('projects.edit', $project) }}">Editar</a>

        <form method="POST" action="{{ route('projects.destroy', $project) }}">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    @endauth

    <p>{{ $project->description }}</p>
    <p>{{ $project->created_at->diffForHumans() }}</p>
@endsection
