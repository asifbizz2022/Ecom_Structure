<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('books')->get(); 
        return view('home')->with('books', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {

       $result = DB::table('books')->where('book_id', $id)->get(); 
        return view('item-details')->with('books', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart(Request $request)
    {

        
        $userid = $request->userid;
        $productId = $request->prod_id; 
        $qty = $request->qty;
        
        $prod = DB::table('books')->where('book_id', $productId)->first();

        $data = DB::table('orders')->insert([
            'user_id'=>$userid,
            'product_id'=>$productId,
            'total_price'=>$qty*$prod->price,
            'qty'=>$qty,
            'order_status'=>'cart',
        ]);
        return back()->with('message', 'Product Added to cart');

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
