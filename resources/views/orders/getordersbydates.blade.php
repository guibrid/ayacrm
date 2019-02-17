<div class="row">
  <div class="col-xs-12">
    <div class="box">

      <div class="box-header">
          <h3 class="box-title">Orders list</h3>
      </div>

      @if(count($order_products) >=1)
        <div class="box-body table-responsive no-padding">
          <table  class="table table-hover">
            <thead>
              <tr>
                <th>product</th>
                <th>quantity</th>
                <th>Unit price</th>
                <th>Totalprice</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $new_order = '';
              foreach($order_products as $order_product) {
                  if ($new_order <> $order_product->order->id) {
                      echo '<tr><td colspan="4" style="background-color:#ccc"># '.$order_product->order->id.'</td></tr>';
                      $new_order = $order_product->order->id;
                  }
                  $totalPrice = $order_product->quantity*$order_product->price;
                
                  echo '<tr><td>'.$order_product->product->name.'</td><td>'.$order_product->quantity.'</td><td>'.round($order_product->price).'฿</td><td>'.round($totalPrice).'฿</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      @else
        <div class="box-body"><h5>No order on this date</h5></div>
      @endif

    </div>
  </div>
</div>