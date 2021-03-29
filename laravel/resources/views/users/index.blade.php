@extends('layout')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0">Usuarios</h1>
            @auth
                <a
                    class="btn btn-primary"
                    href="{{ route('users.create') }}">
                    Crear usuario
                </a>
            @endauth
        </div>

        <p class="lead text-secondary">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>

        <table class="table">
            <thead class="thead-green">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay usuarios para mostrar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
