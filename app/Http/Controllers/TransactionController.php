<?php

namespace App\Http\Controllers;

use App\Cart;
use DB;
use Session;
use App\Models\Service;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service =  Service::all();

        return view('shop.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function getCart() {
        if (!Session::has('cart')) {
            return view('grooming.grooming-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

       
        return view('shop.shopping-cart', ['service' => $cart->service, 'totalPrice' => $cart->totalPrice]);
    }

    public function getAddToCart(Request $request , $id){
        
        $service = Service::find($id);
        $oldCart = Session::has('cart') ? $request->session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($service, $service->id);
        Session::put('cart', $cart);
        Session::save();
        return redirect()->route('shops.index');

    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->service) > 0) {
            Session::put('cart',$cart);
            Session::save();
        }else{
            Session::forget('cart');
        }        
        return redirect()->route('shops.shopping-cart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->service) > 0) {
            Session::put('cart',$cart);
            Session::save();
        }else{
            Session::forget('cart');
        }
         return redirect()->route('shops.shopping-cart');
    }

}
