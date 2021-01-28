@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <h1>Portfolio</h1>

    <ul>
        @forelse ($projects as $project)
            <li> {{ $project->title }}<br>
                <small>{{ $project->description }}</small><br>
                {{ $project->created_at->diffForHumans() }}
            </li>
        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse
    </ul>

    {{ $projects->links() }}
@endsection
