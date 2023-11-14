<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Exception;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function create()
    {
        return view('backend.color.create');
    }
    public function list()
    {
        $colors = Color::all();
        return view('backend.color.list', compact('colors'));
    }
    public function store(ColorRequest $request)
    {
        try {
            $color = $request->all();
            Color::create($color);
            return redirect()->route('color.list')->withMessage('color Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
    public function edit($id)
    {
        $color = Color::find($id);
        return view('backend.color.edit', compact('color'));
    }
    public function update(ColorRequest $request, $id)
    {
        try {
            $color = $request->except('_token');
            Color::where('id', $id)->update($color);
            return redirect()->route('color.list')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError_updated($e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $color = Color::find($id);
            $color->delete();
            return redirect()->route('color.list')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
