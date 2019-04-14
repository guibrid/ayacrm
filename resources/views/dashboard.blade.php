@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->

    

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Shortcuts</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <a class="btn btn-app" href="{{url("/orders/create")}}">
                    <i class="fa fa-edit"></i> Add order
                  </a>
                  @if(Auth::user()->isAdmin())
                  <a class="btn btn-app" href="{{url("/customers/create")}}">
                    <i class="fa fa-edit"></i> Add customer
                  </a>
                  <a class="btn btn-app" href="{{url("/products/create")}}">
                    <i class="fa fa-edit"></i> Add product
                  </a>
                  @endif
              <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Income resume</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php $dayIcome = getIncome(date('Y') ,date('m') ,date('d')); ?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3 style="font-size: 30px">{{ $dayIcome['CA'] }}<sup style="font-size: 15px">฿</sup></h3>
                        <p>Today's CA</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  @if(Auth::user()->isAdmin())
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3 style="font-size: 30px">{{ $dayIcome['benefit'] }}<sup style="font-size: 15px">฿</sup></h3>
                        
                        <p>Today's benefit</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <?php $monthIcome = getIncome(date('Y') ,date('m')); ?>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                          <h3  style="font-size: 30px">{{ $monthIcome['CA'] }}<sup style="font-size: 15px">฿</sup></h3>    
                        <p>Febuary CA</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">
                          <h3 style="font-size: 30px">{{ $monthIcome['benefit'] }}<sup style="font-size: 15px">฿</sup></h3>
                        <p>Febuary benefit</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  @endif
                  <!-- ./col -->
                <!-- /.box-body -->
              </div>
            <!-- /.box -->
          </div>
        </div>
      </div>

      @if(Auth::user()->isAdmin())
      <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Income for the current month</h3>
  
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="areaChart" style="height:250px"></canvas>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
      </div>
      @endif

    </section>
    <!-- /.content -->

@endsection

@section('myjsBottom')
  <!-- bootstrap datepicker -->
  @if(Auth::user()->isAdmin())
  <script src="{{ asset ("/bower_components/chart.js/Chart.js") }}"></script>
  <script type="text/javascript">var monthIncomeDetails = <?php echo json_encode($monthIcome); ?>;</script>
  @endif
  <script src="{{ asset ("/js/dashboard.js") }}"></script>
@endsection