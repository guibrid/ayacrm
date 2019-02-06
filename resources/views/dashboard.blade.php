@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <ul>
                        <li><a href="{{url("/products")}}">Product List</li></li>
                        <li><a href="{{url("/products/create")}}">Add new product</a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
