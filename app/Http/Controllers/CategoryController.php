<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
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

    public function show($param)
    {
        $data = Category::where('slug', $param)->firstOrFail();
        $produk = Product::where('category_id', $data->id)->get();
        return view('category.show', compact('data', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);

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

        // mengubah data
        $data->update($simpan);
        return redirect()->route('category.show', $data->slug)
        ->with('success', 'Data berhasil diubah');

    }

     public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->route('category.index')
        ->with('success', 'Data berhasil dihapus');
    }

}
