@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1 class="mb-3">Modifica il prodotto: {{ $comic->title }}</h1>
        
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf   {{-- essenziale per inviare i dati in modo sicuro --}}
            <div class="form-group mb-3">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">  {{-- il name e' quello che effettivamente mi compare nel backend --}}
            </div>

            <div class="form-group mb-3">
              <label for="thumb">Url Immagine</label>
              <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb}}">
            </div>

            <div class="form-group mb-3">
              <label for="price">Prezzo</label>
              <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price}}">
            </div>

            <div class="form-group mb-3">
              <label for="series">Serie</label>
              <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series}}">
            </div>
            
            <div class="form-group mb-3">
              <label for="sale_date">Data di uscita</label>
              <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date}}">
            </div>
            
            <div class="form-group mb-3">
              <label for="type">Scegli un Tipo</label>
              <select class="form-control" id="type" name="type">
                {{-- preseleziona il valore di type tramite selected --}}
                <option {{ $comic->type === "comic book" ? 'selected' : '' }} value="comic book">Comic book</option>    {{-- la value e' il valore che verra' passato al database --}}
                <option {{ $comic->type === "graphic novel" ? 'selected' : '' }} value="graphic novel">Graphic novel</option>
              </select>
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ $comic->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</section>
@endsection