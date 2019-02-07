<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Order;
use App\Order_product;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::pluck('company','id' );
        $products = Product::pluck('name','id');

        //$order_products = Order_product::pluck('quantity','id');


        //return view('products/edit')->with('product', $product);
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
        $order->save();
        
        // Save each order products
        for ($i = 0 ; $i < count($request->input('product_id')) - 1 ; $i++) {
            $order_products = new Order_product;
            $order_products->quantity = $request->input('quantity')[$i];
            $order_products->price = $request->input('price')[$i];
            $order_products->product_id = $request->input('product_id')[$i];
            $order_products->order_id = $order->id;
            $order_products->save();
        }

        return redirect('/dashboard')->with('success', 'your message here'); ;
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
