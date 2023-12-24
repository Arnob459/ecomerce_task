<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function Index(){
        $allproducts = Product::latest()->get();
    return view('user_template.home', compact('allproducts'));

    }

}
