<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Order;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->paginate(20);
        return view('orders/index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate unosa
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'info' => 'required',
        ]);
       // Create Order
       $order = new Order;
       $order->name = $request->input('name');
       $order->price = $request->input('price');
       $order->description = $request->input('description');
       $order->info = $request->input('info');

       $order->save();

       return redirect('/orders')->with('success', 'Unos posiljke uspijesan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show')->with('order', $order); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit')->with('order',$order);
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
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'info' => 'required',
        ]);
        $order = Order::find($id);
       $order->name = $request->input('name');
       $order->price = $request->input('price');
       $order->description = $request->input('description');
       $order->info = $request->input('info');

       $order->save();

       return redirect('/orders')->with('success', 'Posiljka je uspijesno izmijenjena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $order = Order::find($id);
        $order->delete();
        return redirect('/orders')->with('success', 'Posiljka izbrisana iz sistema');
    }
}
