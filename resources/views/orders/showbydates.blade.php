@extends('layouts.app')

@section('content')
<table  class="table">
        <thead>
                <tr>
                  <th>product</th>
                  <th>quantity</th>
                  <th>Unit price</th>
                  <th>price</th>
                </tr>
              </thead>
              <tbody>
<?php
$new_order = '';
foreach($order_products as $order_product) {
    if ($new_order <> $order_product->order->id) {
        echo '<tr><td colspan="4">---'.$order_product->order->id.'----</td></tr>';
        $new_order = $order_product->order->id;
    }
    $totalPrice = $order_product->quantity*$order_product->price;
  
    echo '<tr><td>'.$order_product->product->name.'</td><td>'.$order_product->quantity.'</td><td>'.$order_product->price.'</td><td>'.$totalPrice.'</td></tr>';
}
?>
    </tbody>
</table>
</table>
@endsection