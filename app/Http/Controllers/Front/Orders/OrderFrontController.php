<?php

namespace App\Http\Controllers\Front\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderFrontController extends Controller
{
    public function index(){
        $orders = auth()->user()->orders()->paginate(10);
        return view("front.orders.index", compact("orders"));
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'full_adreess' => 'required',
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $request->merge(['full_adreess' => implode(', ', $request->input('full_adreess'))]);
        $data = $request->except('_token');
        $data['sub_total'] = cartsTotal();
        $data['total'] = cartsTotal();
        $order = Order::create($data);

        foreach(carts() as $item){
            $order->items()->create([
                'product_id' => $item->product->id,
                'product_name' => app()->getLocale() == 'en' ? $item->product->title_en : $item->product->title_ar,
                'product_price' => $item->product->price,
                'quantity' => $item->quantity,
                'sub_total' => $item->quantity * $item->product->price,
                'chosen_color' => $item->color ?? null,
                'chosen_size' => $item->size ?? null,
            ]);
        }

        session()->forget('carts_' . auth()->id());

        return back()->with('success','تم ارسال الطلب بنجاح');
    }
}
