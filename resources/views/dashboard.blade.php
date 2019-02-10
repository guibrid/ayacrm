@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
    

    <!-- Main content -->
    <section class="content container-fluid">


        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <!--<img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">-->
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Orders</h3>
                    <h5 class="widget-user-desc">Manage your orders</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                    <li><a href="{{url("/orders/create")}}">Add new order</a></li>
                    </ul>
                </div>
                </div>
                <!-- /.widget-user -->
            </div>

        <div class="col-md-4">
            <!-- Widget -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <!--<img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">-->
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Products</h3>
                    <h5 class="widget-user-desc">Manage your products</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="{{url("/products")}}">Product List</a></li>
                        <li><a href="{{url("/products/create")}}">Add new product</a></li>
                    </ul>
                </div>
                </div>
            <!-- /.widget -->
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
