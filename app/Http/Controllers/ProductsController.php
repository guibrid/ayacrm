<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
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
        $products = Product::orderBy('name', 'asc')->get();
        return view('products/index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'code' => 'nullable|string',
            'weight' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->weight = $request->input('weight');
        $product->cost = $request->input('cost');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        $product->save();
        return redirect('/products')->with('success', 'New product added!');
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
        $product = Product::findOrFail($id);
        return view('products/edit')->with('product', $product);
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

        $this->validate($request, [
            'name' => 'required|string',
            'code' => 'nullable|string',
            'weight' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->weight = $request->input('weight');
        $product->cost = $request->input('cost');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        $product->save();
        return redirect('/products')->with('success', 'Product updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $product = Product::find($id);
        $product->delete();

        // redirect
        return redirect('/products');
    }

    public function getprice(Request $request)
    {
        $product = Product::find($request->id);
        return $product->price;
    }

    public function getimg(Request $request)
    {
        $product = Product::find($request->id);
        if (is_null($product->img)){
            $product->img = 'nopics.gif';
        }
        return $product->img;
    }
}
