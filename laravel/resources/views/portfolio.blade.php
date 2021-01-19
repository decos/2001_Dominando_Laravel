@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <h1>Portfolio</h1>

    <ul>
        <?php /* foreach ($portfolio as $portfolioItem) {
            echo "<li>" . $portfolioItem['title'] . "</li>";
        } */ ?>

        <?php /* foreach ($portfolio as $portfolioItem): */ ?>
            {{-- <li> {{ $portfolioItem['title'] }} </li> --}}
        <?php /* endforeach */ ?>

        @foreach ($portfolio as $portfolioItem)
            <li> {{ $portfolioItem['title'] }} </li>
        @endforeach
    </ul>
@endsection