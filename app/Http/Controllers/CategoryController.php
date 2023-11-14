<?php

namespace App\Http\Controllers;

use Exception;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    
    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.categories.show', compact('category'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            Category::create([
                'title' => $request->title,
                'description' => $request->description
            ]);
            return redirect()->route('category.index')->withMessage('Product Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }


    public function edit($id)
    {
        $category  = Category::find($id);
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');

            Category::where('id', $id)
                ->update($data);

            return redirect()->route('category.index')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $category =  Category::find($id);
            $category->delete();
            return redirect()->route('category.index')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }


    public function categoryWiseProducts($id)
    {
            $products  = Product::where('category_id', $id)->get();

            return response()->json([
                'status' => 200,
                'products' => $products
            ]);
    }
}
