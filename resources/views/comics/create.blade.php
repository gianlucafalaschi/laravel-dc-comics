@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="mb-3">Crea un nuovo prodotto</h1>
            
            {{-- messaggio di errore in cima al form in caso di  validation failed --}}
            {{-- @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif --}}


            
            <form action="{{ route('comics.store') }}" method="POST">
                @csrf   {{-- essenziale per inviare i dati in modo sicuro --}}
                <div class="form-group mb-3">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">  {{-- il name e' quello che effettivamente mi compare nel backend --}}
                </div>
                {{-- validation error --}}
                @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="thumb">Url Immagine</label>
                  <input type="text" class="form-control" id="thumb" name="thumb" value="{{ old('thumb') }}">
                </div>
                {{-- validation error --}}
                @error('thumb')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="price">Prezzo</label>
                  <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>
               {{-- validation error --}}
               @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="series">Serie</label>
                  <input type="text" class="form-control" id="series" name="series" value="{{ old('series') }}">
                </div>
                {{-- validation error --}}
                @error('series')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="sale_date">Data di uscita</label>
                  <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date') }}">
                </div>
                {{-- validation error --}}
                @error('sale_date')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="type">Tipo</label>
                  <select class="form-control" id="type" name="type">
                    {{-- se i dati del form non sono inviati e l'utente non ha gia' scelto il campo type applica selected, altrimenti no --}}
                    <option {{ old('type') === '' ? 'selected' : ''}} value="" >Scegli un'opzione</option>
                    {{-- se i dati del form non sono inviati e type e' comic book applica selected altrimenti no --}}
                    <option {{ old('type') === 'comic book' ? 'selected' : ''}} value="comic book">Comic book</option>    {{-- la value e' il valore che verra' passato al database --}}
                    {{-- se i dati del form non sono inviati e type e' graphic novel applica selected altrimenti no --}}
                    <option {{ old('type') === 'graphic novel' ? 'selected' : ''}} value="graphic novel">Graphic novel</option>
                  </select>
                </div>
                {{-- validation error --}}
                @error('type')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
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