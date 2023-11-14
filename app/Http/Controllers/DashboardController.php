<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalCategory = Category::count();
        $totalUsers = User::count();

        return view('backend.dashboard', 
                compact(
                    'totalUsers', 
                    'totalCategory', 
                    'totalProducts'
                ));
    }
}
