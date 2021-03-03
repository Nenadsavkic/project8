@section('title')
   Edit Phone
@endsection

@extends('layouts.master')

@section('main')

   <h1>Edit Phone</h1>
   <div class="col-10 offset-1">
       <form action="/phones/{{$phone->id}}" method="POST">
         @csrf
         {{-- menjamo metodu u PUT jer tako zahteva 'rout' (Pogledati route list) --}}
         @method('put')
          <input type="text" name="name" value="{{$phone->name}}" class="form-control"><br>
          <input type="text" name="brand" value="{{$phone->brand}}" class="form-control"><br>
          <input type="number" name="price" value="{{$phone->price}}" class="form-control"><br>
          <button type="submit" class="btn btn-warning form-control">Save</button>

       </form>
   </div>

@endsection
