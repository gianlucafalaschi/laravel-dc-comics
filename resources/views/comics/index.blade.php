@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Comics List</h1>
            <div class="row">
                @foreach ($comics as $comic)
                <div class="col">
                    <div class="card my-3" style="width: 18rem;">
                        <img class="card-img-top" src="https://picsum.photos/200/300" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$comic->title}}</h5>
                          {{-- <p class="card-text">{{$comic->description}}</p> --}}
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{$comic->price}} euro</li>  {{-- essendo  l'istanza di un oggetto devo usare la freccina, se fosse un array associativo sarebbe {{$comic['price']}}   --}}
                          <li class="list-group-item">{{$comic->series}}</li>
                          <li class="list-group-item">{{$comic->sale_date}}</li>
                          <li class="list-group-item">{{$comic->type}}</li>
                        </ul>
                        <div class="card-body">
                          {{-- al click del link viene aperta la pagina del singolo fumetto  --}}
                          <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="card-link">Scopri di più</a>
                          <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="card-link">Modifica prodotto</a>

                          {{-- form per eliminare elemento --}}
                          <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                            @csrf   {{-- essenziale per inviare i dati in modo sicuro --}}
                            @method('DELETE')   {{-- il method nella route list e' PUT, ma se non abbiamo un method GET dobbiamo sempre mettere sopra un method POST. Aggiungiamo PUT per inviare alla giusta route, altrimenti andremmo nella show  --}}

                            
                            <button type="submit" class="btn btn-danger mt-3">Elimina prodotto</button>
                          </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>   
@endsection
