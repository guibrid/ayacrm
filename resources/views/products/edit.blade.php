@extends('layouts.app')

@section('content')
<h1>Edit products</h1>

{!! Form::model($product, [
    'method' => 'PATCH',
    'route' => ['products.update', $product->id]
]) !!}

{!! Form::open(['action' => 'ProductsController@store', 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null,  ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('code', 'Code') !!}
    {!! Form::text('code', null,  ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('weight', 'Weight') !!}
    {!! Form::text('weight', null,  ['class' => 'form-control']) !!}
</div>
<div class="form-group">
        {!! Form::label('cost', 'Cost') !!}
        {!! Form::text('cost', null,  ['class' => 'form-control']) !!}
    </div>
<div class="form-group">
    {!! Form::label('price', 'Price') !!}
    {!! Form::text('price', null,  ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('stock', 'Stock') !!}
    {!! Form::text('stock', null,  ['class' => 'form-control']) !!}
    <div class="form-group">
</div>
<div class="form-group">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@endsection