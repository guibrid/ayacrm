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
                  <a class="btn btn-app" href="{{url("/customers/create")}}">
                    <i class="fa fa-edit"></i> Add customer
                  </a>
                  <a class="btn btn-app" href="{{url("/products/create")}}">
                    <i class="fa fa-edit"></i> Add product
                  </a>
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
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3 style="font-size: 30px">{{ getDailyIncome( date('Y-m-d'), 'ca' ) }}<sup style="font-size: 15px">฿</sup></h3>
                        <p>Today's CA</p>
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
                        <h3 style="font-size: 30px">{{ getDailyIncome( date('Y-m-d'), 'benefit' ) }}<sup style="font-size: 15px">฿</sup></h3>
                        
                        <p>Today's benefit</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                          <h3  style="font-size: 30px">{{ getMonthlyIncome(date('Y') ,date('m'), 'ca')  }}<sup style="font-size: 15px">฿</sup></h3>    
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
                          <h3 style="font-size: 30px">{{ getMonthlyIncome(date('Y') ,date('m'), 'benefit')  }}<sup style="font-size: 15px">฿</sup></h3>
                        <p>Febuary benefit</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                <!-- /.box-body -->
              </div>
            <!-- /.box -->
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->

@endsection
