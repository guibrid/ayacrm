@extends('layouts.app')

@section('content')
<h1>Products</h1>
@if(count($products) >=1)
    @foreach($products as $product)
    <div class="well">
        <h3>{{$product->name}}</h3>
    </div>
    @endforeach
@else
    <p>No posts found</p>
@endif
@endsection
