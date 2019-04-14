@extends('layouts.app')
@section('mycssTop')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset ("/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}">
@endsection

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>View orders by date</h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!-- Datepicker search -->
    @if(Auth::user()->isAdmin())
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Select the date</h3>
            </div>

            <div class="box-body">
              <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  {!! Form::text('date', date('Y-m-d') ,  ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    @else
      {!! Form::hidden('date', date('Y-m-d') ,  ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}
    @endif
             
    <div id="showOrders"></div>
         
  </section>



@endsection

@section('myjsBottom')
  <!-- bootstrap datepicker -->
  <script src="{{ asset ("/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>
  <script type="text/javascript">var getordersbydateUri = "{{ url('/getordersbydate') }}";
</script>
  <script src="{{ asset ("/js/orders/showbydates.js") }}"></script>
@endsection
