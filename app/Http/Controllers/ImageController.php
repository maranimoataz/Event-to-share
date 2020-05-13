<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;

class ImageController extends Controller
{
    
    public function store(Request $request) {
        return image::create($request->all());
        dd();
    }
}
