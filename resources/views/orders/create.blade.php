@extends('layouts.app')

@section('content')
<h1>New order</h1>

{!! Form::open(['action' => 'OrdersController@store', 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control', 'id' => 'customer_id']) !!}
</div>

<div id="product-row"></div>
<!-- Product form rowTemplate -->
<div id="newlinktpl" style="display:none">
    <div class="form-row">
        <div class="form-group col-md-9">
            {!! Form::select('product_id[]', $products, null, ['class' => 'form-control product_id', 'placeholder' => 'Select product']) !!}
        </div>
        <div class="form-group col-md-1">
            {!! Form::text('quantity[]', null,  ['class' => 'form-control', 'placeholder' => 'Qty']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::text('price[]', null,  ['class' => 'form-control', 'placeholder' => 'Unit price']) !!}
        </div>
    </div>
</div>
<!-- Product form rowTemplate -->
<p id="addnew">
    <a href="javascript:new_link()">Add product </a>
</p>

<div class="form-group">
    {!! Form::submit('Save order', [ 'class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<script>
    /*
    Add the new filed row product
    */
    var ct = 1;
    function new_link()
    {
        ct++;
        var div1 = document.createElement('div');
        div1.id = ct;
        // link to delete extended form elements
        var delLink = '<a href="javascript:delIt('+ ct +')">Delele product</a><hr />';
        div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
        document.getElementById('product-row').appendChild(div1);
    }
    // function to delete the newly added set of elements
    function delIt(eleId)
    {
        d = document;
        var ele = d.getElementById(eleId);
        var parentEle = d.getElementById('product-row');
        parentEle.removeChild(ele);
    }

    $(document).on('change', 'select[name="product_id[]"]', function () {
        //$(this).closest('.form-row').find('input[name="price[]"]').val($(this).val());
        priceInput = $(this).closest('.form-row').find('input[name="price[]"]'); // Get the right price input
        productId = $(this).val() // Product id value

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url:"{{ url('/getprice') }}",
            data: {id:productId},

            success:function(data){
                priceInput.val(data);
            }
        });

    });
</script>

@endsection