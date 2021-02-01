@extends('layout')

@section('title', 'About')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mb-4">
                <img class="img-fluid" src="/img/about.svg" alt="Quién soy">
            </div>
            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">
                    Quién soy
                </h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                <a
                    class="btn btn-large btn-block btn-primary"
                    href="{{ route('contact') }}">
                    Contáctame
                </a>
                <a
                    class="btn btn-large btn-block btn-outline-primary"
                    href="{{ route('projects.index') }}">
                    Portafolio
                </a>
            </div>
        </div>
    </div>
@endsection
