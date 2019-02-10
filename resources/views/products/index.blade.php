@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products
        </h1>
    </section>
    

    <!-- Main content -->
    <section class="content container-fluid">
        @if(count($products) >=1)
            
            @foreach($products as $product)

                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-light-blue">
                            <div class="widget-user-image">
                                <!--<img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">-->
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{$product->name}}</h3>
                            <h5 class="widget-user-desc">{{$product->code}}</h5>
                        </div>
                        <div class="box-footer">
                            <ul class="nav nav-stacked">
                            <li>Weight : {{$product->weight}}</li>
                            <li>Cost : {{$product->cost}}TBH</li>
                            <li>Price : {{$product->price}}TBH</li>
                            <li>Stock : {{$product->stock}}</li>
                            </ul>
                            {{ Form::open(array('url' => 'products/' . $product->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-primary">Edit</a>
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </div>
                        
                    </div>
                    <!-- /.widget-user -->
                </div>
            
            @endforeach

        @else
            <p>No products found</p>
        @endif
@endsection
