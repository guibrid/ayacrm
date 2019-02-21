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
    if (! function_exists('getProductCost')) {
        function getProductCost($id)
        {
            $product = Product::find($id);
            return $product->cost;
        }
    }
     


    /**
     * Get the CA of benefit of the month, the day or the year.
     *
     * @param  integer  $month 
     * @param  integer  $year
     * @param  integer  $year
     * @return \Illuminate\Http\Response
     */
    if (! function_exists('getIncome')) {
        function getIncome($year, $month= null, $day= null)
        {
            $amountList = [];
            $CA = 0;
            $benefit = 0;

            if($day){
                $datas = Order_product::with('product')
                ->whereDate('order_products.created_at', $year.'-'.$month.'-'.$day)
                ->get();

                // Loop for each order_products entry
                foreach($datas as $data) {
                    $CA += $data->price * $data->quantity; // Total CA of the month
                    $benefit += ($data->price * $data->quantity) - ($data->cost * $data->quantity); // Total benefits of the month
                }
    
                return ['CA' => round($CA), 'benefit' => round($benefit)];
            }

            if ($month && !$day){
                $datas = Order_product::with('product')
                                        ->whereMonth('order_products.created_at',  $month)
                                        ->whereYear('order_products.created_at',  $year)
                                        ->get();
                //Calculat the total amount for each day of the month
                $amountList = range( 0, cal_days_in_month(CAL_GREGORIAN, $month, $year) ); // Create array with each day of the month
                $amountList = array_fill(1, cal_days_in_month(CAL_GREGORIAN, $month, $year), ['CA' => 0, 'benefit' => 0]); // Set CA and benefits to 0
                unset($amountList[0]); // Delete the first key 0

                // Loop for each order_products entry
                foreach($datas as $data) {
                    $CA += $data->price * $data->quantity; // Total CA of the month
                    $benefit += ($data->price * $data->quantity) - ($data->cost * $data->quantity); // Total benefits of the month
                    // CA et Benefits for each days of the month
                    $dayNbr = ltrim(substr($data->created_at, 8, 2), '0');
                    $amountList[$dayNbr]['CA'] += $data->price * $data->quantity;
                    $amountList[$dayNbr]['benefit'] += ($data->price * $data->quantity) - ($data->cost * $data->quantity);
                } 
                return ['month' => $month, 'year'=> $year,'CA' => round($CA), 'benefit' => round($benefit), 'details' => $amountList];
 
            }


        }
    }
