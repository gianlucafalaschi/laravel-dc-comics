@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Comics List</h1>
            <div class="row">
                @foreach ($comics as $comic)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://picsum.photos/id/237/200/300" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$comic->title}}</h5>
                          <p class="card-text">{{$comic->description}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{$comic->price}} euro</li>  {{-- essendo  l'istanza di un oggetto devo usare la freccina, se fosse un array associativo sarebbe {{$comic['price']}}   --}}
                          <li class="list-group-item">{{$comic->series}}</li>
                          <li class="list-group-item">{{$comic->sale_date}}</li>
                          <li class="list-group-item">{{$comic->type}}</li>
                        </ul>
                        <div class="card-body">
                          <a href="#" class="card-link">Card link</a>
                          <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>   
@endsection
