@extends('layout')

@section('title', 'Contact')

@section('content')

    <div class="container">

        <div class="row">
            {{--
                En bootstrap primero se diseña para telefono
                Y despues para las pantallas más grandes.

                col-12: Por defecto (para todos)
                col-sm-10: Pantalla SM (10 columnas)
                col-lg-6: Pantalla LG (6 columnas)
                mx-auto: margen en el eje x sea automatico
                --}}
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}

                {{--
                    bg-white: fondo blanco
                    shadow: sombra (pa que se separe)
                    rounded: redondear los bordes
                    py-3: agregamos un padding eje y (arriba y abajo)
                    px-4: agregamos un padding eje x (izquierda y derecha)
                    --}}
                <form
                    class="bg-white shadow rounded py-3 px-4"
                    method="POST"
                    action="{{ route('messages.store') }}">
                        @csrf

                        {{-- <h1>Contact</h1> --}}
                        <h1 class="display-4">
                            {{ __('Contact') }}
                        </h1>
                        <hr>

                        <label for="name">Nombre</label>
                        {{--
                            is-ivalid: Indicar a bootstrap que el input es invalido
                            --}}
                        <div class="form-group">
                            <input
                                id="name"
                                class="
                                    form-control
                                    bg-light
                                    shadow-sm
                                    @if ($errors->has('name')) is-invalid @else border-0 @endif
                                "
                                name="name"
                                placeholder="Nombre..."
                                value="{{ old('name') }}">
                            {{--
                                Desde Laravel 5.8.12.
                                --}}
                            {{-- @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                            {{-- {!! $errors->first('name', '<small>:message</small><br>') !!} --}}
                        </div>

                        <label for="email">Email</label>
                        <div class="form-group">
                            <input
                                id="email"
                                class="
                                    form-control
                                    bg-light
                                    shadow-sm
                                    @if ($errors->has('email')) is-invalid @else border-0 @endif
                                "
                                type="text"
                                name="email"
                                placeholder="Email..."
                                value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            {{-- {!! $errors->first('email', '<small>:message</small><br>') !!} --}}
                        </div>

                        <label for="subject">Asunto</label>
                        <div class="form-group">
                            <input
                                id="subject"
                                class="
                                    form-control
                                    bg-light
                                    shadow-sm
                                    @if ($errors->has('subject')) is-invalid @else border-0 @endif
                                "
                                name="subject"
                                placeholder="Asunto..."
                                value="{{ old('subject') }}">

                            @if ($errors->has('subject'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif

                            {{-- {!! $errors->first('subject', '<small>:message</small><br>') !!} --}}
                        </div>

                        <label for="content">Mensaje</label>
                        <div class="form-group">
                            <textarea
                                id="content"
                                class="
                                    form-control
                                    bg-light
                                    shadow-sm
                                    @if ($errors->has('content')) is-invalid @else border-0 @endif
                                "
                                name="content"
                                placeholder="Mensaje..."
                                value="{{ old('content') }}"></textarea>

                            @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif

                            {{-- {!! $errors->first('content', '<small>:message</small><br>') !!} --}}
                        </div>

                        <button class="btn btn-primary btn-lg btn-block">Send</button>
                </form>

            </div>
        </div>

    </div>

@endsection
