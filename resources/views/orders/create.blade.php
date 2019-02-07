@extends('layouts.app')

@section('content')
<h1>New order</h1>

{!! Form::open(['action' => 'OrdersController@store', 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control']) !!}
</div>
<div  style="width:600px"><div>
<div class="form-row" id="newlink">
    <div class="form-group col-md-9">
        {!! Form::select('product_id[]', $products, null, ['class' => 'form-control', 'placeholder' => 'Select product']) !!}
    </div>
    <div class="form-group col-md-1">
        {!! Form::text('quantity[]', null,  ['class' => 'form-control', 'placeholder' => 'Qty']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::text('price[]', null,  ['class' => 'form-control', 'placeholder' => 'Unit price']) !!}
    </div>
</div>
<p id="addnew">
        <a href="javascript:new_link()">Add product </a>
    </p>






<div class="form-group">
    {!! Form::submit('Save order', [ 'class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}




<!-- Template. This whole data will be added directly to working form above -->
<div id="newlinktpl" style="display:none">
    <div class="form-row">
        <div class="form-group col-md-9">
            {!! Form::select('product_id[]', $products, null, ['class' => 'form-control', 'placeholder' => 'Select product']) !!}
        </div>
        <div class="form-group col-md-1">
            {!! Form::text('quantity[]', null,  ['class' => 'form-control', 'placeholder' => 'Qty']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::text('price[]', null,  ['class' => 'form-control', 'placeholder' => 'Unit price']) !!}
        </div>
    </div>
</div>

<script>
        /*
        This script is identical to the above JavaScript function.
        */
        var ct = 1;
        function new_link()
        {
            ct++;
            var div1 = document.createElement('div');
            div1.id = ct;
            // link to delete extended form elements
            var delLink = '<div style="text-align:right;margin-right:65px"><a href="javascript:delIt('+ ct +')">Del</a></div>';
            div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            document.getElementById('newlink').appendChild(div1);
        }
        // function to delete the newly added set of elements
        function delIt(eleId)
        {
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('newlink');
            parentEle.removeChild(ele);
        }
        </script>
@endsection