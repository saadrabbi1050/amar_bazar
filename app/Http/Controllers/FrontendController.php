<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $products  = Product::all();

        return view('frontend.dashboard', compact('categories', 'products'));
    }

    public function categoryWiseProducts($cateID)
    {
        $categories = Category::all();
        $category = Category::find($cateID);
        return view('frontend.category-wise-products', compact('category', 'categories'));
    }

    public function productDetails($productID)
    {
        $product = Product::find($productID);
        return view('frontend.product-details', compact('product'));

    }
}
