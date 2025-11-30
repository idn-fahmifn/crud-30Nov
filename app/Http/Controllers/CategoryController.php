<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function store(Request $request)
    {
        // rules
        $request->validate([
            'cat_name' => ['required','string', 'min:3', 'max:40'],
            'desc' => ['required'],
        ]);

        // data yang akan dikirim ke database
        $simpan = [
            'category_name' => $request->input('cat_name'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->input('cat_name').'-'.random_int(0000, 9999))
        ];

        // proses mengirim data
        Category::create($simpan);

        // setelah kirim data, redirect ke halaman index
        return redirect()->route('category.index')->with('success', 'Data berhasil disimpan');


    }
}
