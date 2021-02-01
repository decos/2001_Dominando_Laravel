@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <div class="container">
        <h1 class="display-4">Portfolio</h1>
        <p class="lead text-secondary">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
        @auth
            <a href="{{ route('projects.create') }}">Crear proyecto</a>
        @endauth

        <ul class="list-group">
            @forelse ($projects as $project)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a
                        class="d-flex justify-content-between align-items-center"
                        href="{{ route('projects.show', $project) }}"
                    >
                        <span class="text-secondary font-weight-bold">
                            {{ $project->title }}
                        </span>
                        <span class="text-black-50">
                            {{ $project->created_at->format('d/m/Y') }}
                        </span>
                    </a>
                </li>
            @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    No hay proyectos para mostrar
                </li>
            @endforelse
        </ul>

        {{--
            Pagination is not working as I expect in Laravel 5.6
            --}}
        {{-- <p>
            {{ $projects->links() }}
        </p> --}}
    </div>
@endsection
