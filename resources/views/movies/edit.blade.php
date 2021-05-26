@extends('layouts.base')

@section('pageTitle')
  Modifica Film: {{$movie->title}}
@endsection

@section('content')
    
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach  
      </ul>  
    </div>      
  @endif

  <div class="mt-5 mb-5">
    <form action="{{route('movies.update', ['movie' => $movie->id])}}" method="POST">
      @method('PUT')
      @csrf
      {{-- <div class="form-group">
        <label for="image_cover">Immagine Cover</label>
        <input type="text" class="form-control" value="{{$movie->image_cover}}" id="image_cover" name="image_cover" placeholder="URL Immagine">
      </div> --}}
      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" value="{{$movie->title}}" id="title" name="title" placeholder="Titolo">
      </div>
      <div class="form-group">
        <label for="director">Regista</label>
        <input type="text" class="form-control" value="{{$movie->director}}" id="director" name="director" placeholder="Regista">
      </div>
      <div class="form-group">
        <label for="genre">Generi</label>
        <input type="text" class="form-control" value="{{$movie->genre}}" id="genre" name="genre" placeholder="Generi">
      </div>
      <div class="form-group">
        <label for="duration">Durata</label>
        <input class="form-control" id="duration" value="{{$movie->duration}}" name="duration" placeholder="Durata">
      </div>
      <div class="form-group">
        <label for="year">Anno</label>
        <input class="form-control" id="year" value="{{$movie->year}}" name="year" placeholder="Anno">
      </div>
      <div class="form-group">
        <label for="plot">Trama</label>
        <textarea class="form-control" id="plot" name="plot" row="8" placeholder="Trama...">{{$movie->plot}}</textarea>
      </div>
  
      <button type="submit" class="btn btn-primary">Salva</button>
    </form>
  </div>
    
  <a href="{{route('movies.index')}}">Torna all'HomePage</a>

@endsection