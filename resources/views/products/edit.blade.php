@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit product
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content container-fluid">

         <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($product, [
                'method' => 'PATCH',
                'route' => ['products.update', $product->id]
            ]) !!}
            {!! Form::open(['action' => 'ProductsController@store', 'method' => 'post']) !!}

                <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null,  ['class' => 'form-control input-lg']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('code', 'Code') !!}
                    {!! Form::text('code', null,  ['class' => 'form-control input-lg']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('weight', 'Weight') !!}
                    {!! Form::text('weight', null,  ['class' => 'form-control input-lg']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cost', 'Cost') !!}
                    {!! Form::text('cost', null,  ['class' => 'form-control input-lg']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price', null,  ['class' => 'form-control input-lg']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('stock', 'Stock') !!}
                    {!! Form::text('stock', null,  ['class' => 'form-control input-lg']) !!}
                </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    
@endsection
