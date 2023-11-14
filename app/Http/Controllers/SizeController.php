<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view('backend.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('backend.sizes.create');
    }

    public function store(SizeRequest $request)
    {
        try {
            Size::create([
                'title' => $request->title,
                'description' => $request->description
            ]);
            return redirect()->route('size.index')->withMessage('Product Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $size  = size::find($id);
        return view('backend.sizes.edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');

            Size::where('id', $id)
                ->update($data);

            return redirect()->route('size.index')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }




    public function destroy($id)
    {
        try {

            $size =  Size::find($id);
            $size->delete();
            return redirect()->route('size.index')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
