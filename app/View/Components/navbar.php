<?php

namespace App\View\Components;

use Closure;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class navbar extends Component
{
    
    public function __construct()
    {
        //
    }

    
    public function render():  View|Closure|string
    {
        $categories = Category::all();

        $totalCartItems = 0;

        if(auth()->user()){

            $totalCartItems  = Cart::where('customer_id', auth()->user()->id )->count();

        }
        
        return view('components.navbar', compact('categories', 'totalCartItems'));
    }
}
