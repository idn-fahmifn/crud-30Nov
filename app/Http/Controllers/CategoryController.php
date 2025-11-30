<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => ['required','string', 'min:3', 'max:40'],
            'desc' => ['required'],
        ]);
    }
}
