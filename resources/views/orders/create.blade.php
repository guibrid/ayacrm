@extends('layouts.app')
@section('mycssTop')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset ("/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}">
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New order
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content container-fluid">
        {!! Form::open(['action' => 'OrdersController@store', 'method' => 'post']) !!}
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Add your new order</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">

                    <div class="form-group">
                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('date', date('Y-m-d') ,  ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('customer_id', 'Customer') !!}
                        {!! Form::select('customer_id', $customers, null, ['class' => 'form-control input-lg', 'id' => 'customer_id']) !!}
                    </div>

                    <div id="product-row"></div>

                    <!-- Product form rowTemplate -->
                    <div id="newlinktpl" style="display:none">
                        <div class="form-row">
                            <div class="form-group col-md-1 imgProduct">
                                
                            </div>
                            <div class="form-group col-md-7">
                                {!! Form::select('product_id[]', $products, null, ['class' => 'form-control product_id input-lg', 'placeholder' => 'Select product']) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::text('quantity[]', null,  ['class' => 'form-control input-lg', 'placeholder' => 'Qty']) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::text('price[]', null,  ['class' => 'form-control input-lg', 'placeholder' => 'Unit price']) !!}
                            </div>

                        </div>
                    </div>
                    <!-- Product form rowTemplate -->

                    <div class="row">
                        <div class="form-group col-md-2">
                            <p id="addnew">
                                <a href="javascript:new_link()" class="btn btn-block btn-success btn-lg">Add product </a>
                            </p>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

            </div>

            <div class="form-group">
                {!! Form::submit('Save order', [ 'class' => 'btn btn-primary btn-lg']) !!}
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
        var delLink = '<a href="javascript:delIt('+ ct +')" style="display:inline-block; margin-left: 20px">Delele product</a><hr />';
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
        qtyInput = $(this).closest('.form-row').find('input[name="quantity[]"]'); // Get the right price input
        imgDiv = $(this).closest('.form-row').find('.imgProduct');
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
                qtyInput.val(1);
            }
        });

        $.ajax({
            type: 'post',
            url:"{{ url('/getimg') }}",
            data: {id:productId},

            success:function(data){
                img = '<img src="{{asset("img/products")}}/'+data+'" width="100" height="100" />';
                imgDiv.append(img);
            }
        });

    });
</script>

</section>
<!-- /.content -->

@endsection

@section('myjsBottom')
  <!-- bootstrap datepicker -->
  <script src="{{ asset ("/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>
  <script src="{{ asset ("/js/orders/create.js") }}"></script>
@endsection