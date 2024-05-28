@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="mb-3">Crea un nuovo prodotto</h1>
            
            {{-- messaggio di errore in caso di  validation failed --}}
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
                  <input type="text" class="form-control" id="title" name="title">  {{-- il name e' quello che effettivamente mi compare nel backend --}}
                </div>
                {{-- validation error --}}
                @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="thumb">Url Immagine</label>
                  <input type="text" class="form-control" id="thumb" name="thumb">
                </div>
                {{-- validation error --}}
                @error('thumb')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="price">Prezzo</label>
                  <input type="text" class="form-control" id="price" name="price">
                </div>
               {{-- validation error --}}
               @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="series">Serie</label>
                  <input type="text" class="form-control" id="series" name="series">
                </div>
                {{-- validation error --}}
                @error('series')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="sale_date">Data di uscita</label>
                  <input type="date" class="form-control" id="sale_date" name="sale_date">
                </div>
                {{-- validation error --}}
                @error('sale_date')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                  <label for="type">Tipo</label>
                  <select class="form-control" id="type" name="type">
                    <option value="" selected>Scegli un'opzione</option>
                    <option value="comic book">Comic book</option>    {{-- la value e' il valore che verra' passato al database --}}
                    <option value="graphic novel">Graphic novel</option>
                  </select>
                </div>
                {{-- validation error --}}
                @error('type')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
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