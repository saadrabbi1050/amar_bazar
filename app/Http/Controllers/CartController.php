<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        $customer = auth()->user();

        Cart::create([
            'product_id' => $request->product_id, 
            'product_name' => $product->title, 
            'qty' => $request->qty, 
            'unit_price' => $product->price,
            'total_price' => $request->qty * $product->price, 
            'customer_id' => $customer->id, 
            'customer_name' => $customer->name , 
            'color_id' => $request->color_id,
        ]);

        return redirect()->back();
    }

    public function cartItems()
    {
        $cartItems = Cart::where('customer_id', auth()->user()->id)->get();
        
        return view('frontend.cart-items', compact('cartItems'));
    }
}
