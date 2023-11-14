<?php

namespace App\View\Components;

use Closure;
use App\Models\Slider as SliderModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class slider extends Component
{
    
    public function __construct()
    {
        //
    }

    
    public function render(): View|Closure|string
    {
        $sliders = SliderModel::all();
        return view('components.slider', compact('sliders'));
    }
}
