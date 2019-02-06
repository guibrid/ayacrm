@extends('layouts.app')

@section('content')
<h1>Products</h1>
@if(count($products) >=1)
    <div class="row">
    @foreach($products as $product)
        
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Code : {{$product->code}}</h6>
                    <p class="card-text">
                            Weight : {{$product->weight}}<br />
                            Cost : {{$product->cost}}TBH<br />
                            Price : {{$product->price}}TBH<br />
                            Stock : {{$product->stock}}
                    </p>
                    <!--<a href="#" class="card-link">Edit </a>
                    <a href="#" class="card-link">Delete</a>-->
                </div>
            </div>
        </div>
    
    @endforeach
</div>
@else
    <p>No posts found</p>
@endif
@endsection
