<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use PHPUnit\Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.sliders.create');
    }

    public function store(Request $request)
    {
        try {

            if($request->hasFile('image')){
                $image = $this->uploadImage($request->image, $request->title);
            }

            Slider::create([
                'title' => $request->title,
                'image' => $image
            ]);
            return redirect()->route('slider.index')->withMessage('Product Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $slider  = Slider::find($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');

            

            if($request->hasFile('image')){
                $previouseImage = Slider::find($id)->image;
                $this->unlink($previouseImage);

                $data['image'] = $this->uploadImage($request->image, $request->title);
            }

            Slider::where('id', $id)
                ->update($data);

            return redirect()->route('slider.index')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }




    public function destroy($id)
    {
        try {

            $slider =  Slider::find($id);
            $slider->delete();
            return redirect()->route('slider.index')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function uploadImage($imageFile, $title)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $file_name = $timestamp .'-'.$title. '.' . $imageFile->getClientOriginalExtension();
        
        $pathToUpload = storage_path().'/app/public/sliders/'; 
        
        if(!is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0755, true);
        }
        
        Image::make($imageFile)->resize(634,792)->save($pathToUpload.$file_name);

        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/sliders/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}
