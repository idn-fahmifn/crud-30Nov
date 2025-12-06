<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; //import model product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'data' => Product::all(),
            'category' => Category::all()
        ]);
    }
}
