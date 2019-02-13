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

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Products list</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">

                        @if(count($products) >=1)
                                
                            <table class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th></th>
                                </tr>

                                @foreach($products as $product)

                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{ Form::open(array('url' => 'products/' . $product->id, 'class' => 'pull-right')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-edit fa-2x"></i></a>
                                            <!--{{ Form::submit('Del', array('class' => 'btn btn-danger')) }}-->
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                
                                @endforeach

                            </table>

                        @else
                            <p>No products found</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
@endsection
