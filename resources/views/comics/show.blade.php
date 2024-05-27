@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="text-center mb-5">Single comic</h1>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://picsum.photos/200/300" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$comic->title}}</h5>
                          <p class="card-text">{{$comic->description}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{$comic->price}} euro</li>
                          <li class="list-group-item">{{$comic->series}}</li>
                          <li class="list-group-item">{{$comic->sale_date}}</li>
                          <li class="list-group-item">{{$comic->type}}</li>
                        </ul>
                        <div class="card-body">
                          <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="card-link">Modifica prodotto</a>
                          <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection