@extends('layouts.base')

@section('pageTitle')
  Lista di Tutti i Film
@endsection

@section('content')

  <div class="mt-5">

    <div class="mb-3 text-right">
      <a href="{{route('movies.create')}}"><button type="button" class="btn btn-success">Aggiungi Film</button></a>
    </div>
    
    <table class="table table-striped">

      <thead>
        <tr>
          <td scope="col">Title</td>
          <td scope="col">Director</td>
          <td scope="col">Genres</td>
          <td scope="col">Actions</td>
        </tr>
      </thead>

      <tbody>
      @foreach ($movies as $movie)
          <tr>
            {{-- <td><img src="{{$movie->image_cove}}" alt="{{$movie->title}}" style="width: 100px"></td> --}}
            <td>{{$movie->title}}</td>
            <td>{{$movie->director}}</td>
            <td>{{$movie->genre}}</td>
            <td>
              <a href="{{route('movies.show', ['movie' => $movie->id ])}}"><button type="button" class="btn btn-primary">Dettaglio Film</button></a>
              <a href="{{route('movies.edit', ['movie' => $movie->id ])}}"><button type="button" class="btn btn-success">Modifica Film</button></a>
              <form action="{{route('movies.destroy', ['movie' =>$movie->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina Film</button>
              </form>
            </td>
          </tr>
      @endforeach
      </tbody>

    </table>
  </div>

  @if (session('message'))
      <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px;">
        {{session('message')}}
      </div>
  @endif

@endsection