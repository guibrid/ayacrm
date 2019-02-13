@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add customer
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
            {!! Form::open(['action' => 'CustomersController@store', 'method' => 'post']) !!}
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('company', 'Company name') !!}
                        {!! Form::text('company', null,  ['class' => 'form-control input-lg']) !!}
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