@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <form action="{{ route('comics.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group mb-3">
                  <label for="thumb">Url Immagine</label>
                  <input type="text" class="form-control" id="thumb" name="thumb">
                </div>

                <div class="form-group mb-3">
                  <label for="price">Prezzo</label>
                  <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="form-group mb-3">
                  <label for="series">Serie</label>
                  <input type="text" class="form-control" id="series" name="series">
                </div>
                
                <div class="form-group mb-3">
                  <label for="sale_date">Data di uscita</label>
                  <input type="text" class="form-control" id="sale_date" name="sale_date">
                </div>
                
                <div class="form-group mb-3">
                  <label for="type">Scegli un Tipo</label>
                  <select class="form-control" id="type" name="type">
                    <option value="comic book">Comic book</option>
                    <option value="graphic novel">Graphic novel</option>
                  </select>
                </div>

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </section>
@endsection