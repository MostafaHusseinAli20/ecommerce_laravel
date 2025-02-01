<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('dashboard.orders.show', compact('order'));
    }

    public function update(Order $order){
        if($order->status != request()->status){

            $order->tracks()->create([
                'status'=> request('status'),
                'message'=> request()->status_notes ?? ('new order status is '.request('status')),
            ]);
            
        }
        $order->update(request()->only('status'));
        return back();
    }
}
