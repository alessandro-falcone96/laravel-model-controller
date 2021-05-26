@extends('layouts.base')

@section('pageTitle')

  {{$movie->title}}

@endsection

@section('content')
    
    <div class="mt-5">
      <h4>{{$movie->duration}}</h4>
      <h4>{{$movie->year}}</h4>
      <p>{{$movie->plot}}</p>

      <a href="{{route('movies.index')}}">Torna all'HomePage</a>
    </div>

@endsection