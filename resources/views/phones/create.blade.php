@section('title')
    New Phone
@endsection

@extends('layouts.master')
@section('main')

    <h2 class="display-4 m-3">New Phone</h2><br>
    <div class="col-10 offset-1">
        <form action="/phones" method="POST">
             @csrf
           <input type="text" name="name" placeholder="name" class="form-control"><br>
           <input type="text" name="brand" placeholder="brand" class="form-control"><br>
           <input type="number" name="price" placeholder="price" class="form-control"><br>
           <button type="submit" class="btn btn-primary form-control">Save</button>

        </form>
    </div>


@endsection
