<?php
    use Illuminate\Support\Facades\DB;
    use App\Order_product;
    use App\Product;
    use App\Order;

    /**
     * Get total amount of an order.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    if (! function_exists('getTotalOrder')) {
        function getTotalOrder($id)
        {
            // Get all product sold that $day
            $datas = Order_product::where('order_id', $id)->get();

            $total = 0;
            //Calculat the total order amount
            foreach($datas as $data) {
                $value = $data->price * $data->quantity;
                $total += $value;
            }
            return round($total);
        }
    }

    /**
     * Get customer name by order id
     *
     * @param  int  $id order
     * @return \Illuminate\Http\Response
     */
    if (! function_exists('getCustomerByOrder')) {
        function getCustomerByOrder($id)
        {
            // Get customer details
            $datas = Order::with('customer')->find($id);

            if(!$datas) {
                return null;
            }

            return $datas->customer->company;
        }
    }

    /**
     * Get cost of product.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    if (! function_exists('getDailyIncome')) {
        function getProductCost($id)
        {
            $product = Product::find($id);
            return $product->cost;
        }
    }

    /**
     * Get the CA or benefit of the day.
     *
     * @param  string  $type (ca or benefit)
     * @param  timestamp  $day (year-mo-da)
     * @return \Illuminate\Http\Response
     */

    if (! function_exists('getDailyIncome')) {
        function getDailyIncome($day, $type)
        {
            // Get all product sold that $day
            $datas = Order_product::with('product')
                                    ->whereDate('order_products.created_at', $day)
                                    ->get();
            $total = 0;
            //Calculat the total amount for each
            foreach($datas as $data) {
                if($type === 'ca') { // If it is a CA type
                    $value = $data->price * $data->quantity;
                } else { // If it is a Benefit type
                    $value = ($data->price * $data->quantity) - ($data->product->cost * $data->quantity);
                }
                $total += $value;
            }
            return round($total);
        }
    }

    /**
     * Get the CA of benefit of the month.
     *
     * @param  string  $type (ca or benefit)
     * @param  string  $month 
     * @param  string  $year
     * @return \Illuminate\Http\Response
     */

    if (! function_exists('getMonthlyIncome')) {
        function getMonthlyIncome($year, $month, $type)
        {
            // Get all product sold that $day
            $datas = Order_product::with('product')
                                    ->whereMonth('order_products.created_at',  $month)
                                    ->whereYear('order_products.created_at',  $year)
                                    ->get();
            $total = 0;
            //Calculat the total amount for each
            foreach($datas as $data) {
                if($type === 'ca') { // If it is a CA type
                    $value = $data->price * $data->quantity;
                } else { // If it is a Benefit type
                    $value = ($data->price * $data->quantity) - ($data->product->cost * $data->quantity);
                }
                $total += $value;
            }
            return round($total);
        }
    }
