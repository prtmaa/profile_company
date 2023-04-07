<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Fitur;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        $fitur = Fitur::all();
        $about = About::first();
        return view('index', compact('slider', 'about', 'fitur'));
    }
}
