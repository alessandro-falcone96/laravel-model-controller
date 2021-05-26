@extends('layouts.base')

@section('pageTitle')
  Aggiungi un Nuovo Film
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
    <form action="{{route('movies.store')}}" method="POST">
      @csrf
      @method('POST')
      {{-- <div class="form-group">
        <label for="image_cover">Immagine Cover</label>
        <input type="text" class="form-control" id="image_cover" name="image_cover" placeholder="URL Immagine">
      </div> --}}
      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{old('title')}}">
      </div>
      <div class="form-group">
        <label for="director">Regista</label>
        <input type="text" class="form-control" id="director" name="director" placeholder="Regista" value="{{old('director')}}">
      </div>
      <div class="form-group">
        <label for="genre">Generi</label>
        <input type="text" class="form-control" id="genre" name="genre" placeholder="Generi" value="{{old('genre')}}">
      </div>
      <div class="form-group">
        <label for="duration">Durata</label>
        <input class="form-control" id="duration" name="duration" placeholder="Durata" value="{{old('duration')}}">
      </div>
      <div class="form-group">
        <label for="year">Anno</label>
        <input class="form-control" id="year" name="year" placeholder="Anno" value="{{old('year')}}">
      </div>
      <div class="form-group">
        <label for="plot">Trama</label>
        <textarea class="form-control" id="plot" name="plot" row="8" placeholder="Trama...">{{old('plot')}}</textarea>
      </div>
  
      <button type="submit" class="btn btn-primary">Salva</button>
    </form>
  </div>
    
  <a href="{{route('movies.index')}}">Torna all'HomePage</a>

@endsection