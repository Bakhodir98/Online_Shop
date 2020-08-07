<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class BasketController extends Controller
{
    public function basket() 
    {
        $orderId = session('orderId');
        // dd($orderId);
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('order'));
    }
    public function orderPlace() 
    {
        return view('order');
    } 
    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if(is_Null($orderId))
        {
         $order = Order::create();   
         session(['orderId'=>$order->id]);
        }
        else{
            $order = Order::find($orderId);
        }
        if($order->products->contains($productId))
        {
            //  dd('yes');

            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            // dd($pivotRow);
            $pivotRow->update();   
            // dd($pivotRow);

        }
        else
        {
        //  dd('no');

            $order->products()->attach($productId);
        }
        return redirect()->route('basket');        
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if(is_Null($orderId))
        {
        return redirect()->route('basket');        
        }
        $order = Order::find($orderId);

        if($order->products->contains($productId))
        {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            // dd($pivotRow);
            if($pivotRow->count < 2)
            {
                $order->products()->detach($productId);
            }
            else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        return redirect()->route('basket');        
    }
}