@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <form>
                <div class="form-group mb-3">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title">
        
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection