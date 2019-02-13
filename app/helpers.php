<?php
    use Illuminate\Support\Facades\DB;
    use App\Order_product;

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
