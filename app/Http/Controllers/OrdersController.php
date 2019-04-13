<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\Product;
use App\Order;
use App\Order_product;
use Carbon\Carbon;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::pluck('company','id' );
        $products = Product::orderBy('name', 'ASC')->get();
        $products = $products->pluck('name','id');

        return view('orders/create')->with(compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Save Order
        $order = new Order;
        $order->customer_id = $request->input('customer_id');
        $order->created_at = $request->input('date').' '.Carbon::now()->format('h:i:s');
        $order->updated_at = $request->input('date').' '.Carbon::now()->format('h:i:s');
        $order->save();
        
        // Save each order products
        for ($i = 0 ; $i < count($request->input('product_id')) - 1 ; $i++) {
            $order_products = new Order_product;
            $order_products->quantity = $request->input('quantity')[$i];
            $order_products->cost = getProductCost($request->input('product_id')[$i]);
            $order_products->price = $request->input('price')[$i];
            $order_products->product_id = $request->input('product_id')[$i];
            $order_products->created_at = $request->input('date').' '.Carbon::now()->format('h:i:s');
            $order_products->updated_at = $request->input('date').' '.Carbon::now()->format('h:i:s');
            $order_products->order_id = $order->id;
            $order_products->save();

            // Update stock product
            $product_stock = Product::find($order_products->product_id, ['stock']);
            DB::table('products')
                        ->where('id', $request->input('product_id')[$i])
                        ->update(['stock' => $product_stock->stock - $request->input('quantity')[$i]]);
        }

        return redirect('/dashboard')->with('success', 'New order saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the all order in a range of dates.
     *
     * @return \Illuminate\Http\Response
     */
    public function showByDates()
    {
        return view('orders/showbydates');
    }

    /**
     * Ajaxcall to Display orders by the date selected.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getOrdersByDate(Request $request)
    {
        $order_products = Order_product::with('order', 'product')
                            ->whereDate('order_products.created_at', $request->date)
                            ->get();
        return view('orders/getordersbydates')->with('order_products', $order_products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
