@extends('layout')

@section('title', 'Editar proyecto')

@section('content')
    <h1>Editar proyecto</h1>

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('projects.update', $project) }}">
        {{-- De esta forma Laravel va saber que nuestra intención es enviar una petición de tipo PATCH --}}
        @method('PATCH')

        @include('projects._form', ['btnText' => 'Actualizar'])

    </form>
@endsection
