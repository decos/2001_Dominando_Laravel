@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <h1>Portfolio</h1>

    <ul>
        @if ($portfolio)
            @foreach ($portfolio as $portfolioItem)
                <li> {{ $portfolioItem['title'] }} </li>
            @endforeach
        @else
            <li>No hay proyectos para mostrar</li>
        @endif
    </ul>
@endsection
