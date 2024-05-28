@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1 class="mb-3">Modifica il prodotto: {{ $comic->title }}</h1>
        
        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf   {{-- essenziale per inviare i dati in modo sicuro --}}
            @method('PUT')   {{-- il method nella route list e' PUT, ma se non abbiamo un method GET dobbiamo sempre mettere sopra un method POST. Aggiungiamo PUT per inviare alla giusta route, altrimenti andremmo nella show  --}}

            <div class="form-group mb-3">
              <label for="title">Titolo</label>
              {{-- se c'è l'old di title stampalo, altrimenti stampa come valore di default $comic->title  --}}
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $comic->title) }}">  {{-- il name e' quello che effettivamente mi compare nel backend --}}
            </div>
            {{-- validation error --}}
            @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
              <label for="thumb">Url Immagine</label>
              <input type="text" class="form-control" id="thumb" name="thumb" value="{{ old('thumb', $comic->thumb) }}">
            </div>
            {{-- validation error --}}
            @error('thumb')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
              <label for="price">Prezzo</label>
              <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $comic->price) }}">
            </div>
            {{-- validation error --}}
            @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
              <label for="series">Serie</label>
              <input type="text" class="form-control" id="series" name="series" value="{{ old('series', $comic->series) }}">
            </div>
            {{-- validation error --}}
            @error('series')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
              <label for="sale_date">Data di uscita</label>
              <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}">
            </div>
            {{-- validation error --}}
            @error('sale_date')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="form-group mb-3">
              <label for="type">Tipo</label>
              <select class="form-control" id="type" name="type">
                {{-- preseleziona il valore di type tramite selected --}}
                <option value="" {{ $comic->type === '' ? 'selected' : ''}}>Scegli un'opzione</option>
                <option {{ $comic->type === "comic book" ? 'selected' : '' }} value="comic book">Comic book</option>    {{-- la value e' il valore che verra' passato al database --}}
                <option {{ $comic->type === "graphic novel" ? 'selected' : '' }} value="graphic novel">Graphic novel</option>
              </select>
            </div>
            {{-- validation error --}}
            @error('type')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $comic->description) }}</textarea>
            </div>
            {{-- validation error --}}
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</section>
@endsection