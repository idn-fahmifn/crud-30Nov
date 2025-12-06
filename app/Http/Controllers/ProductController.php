<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; //import model product
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'data' => Product::all(),
            'category' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'prod_name' => ['required', 'string', 'min:3', 'max:30'],
            'category' => ['required', 'integer'],
            'price_product' => ['required', 'numeric', 'min:500', 'max:99999999'],
            'stock_product' => ['required', 'integer', 'min:0', 'max:999'],
            'image_product' => ['required', 'file', 'mimes:png,jpg,jpeg,svg,webp,heic'],
            'desc' => ['required']
        ]);
        // data yang harus disimpan : disesuaikan dengan database
        $simpan = [
            'category_id' => $request->input('category'),
            'product_name' => $request->input('prod_name'),
            'price' => $request->input('price_product'),
            'stock' => $request->input('stock_product'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->prod_name) . random_int(0, 9999)
        ];
        // kondisi saat ada nilai input file gambar
        if ($request->hasFile('image_product')) {
            $gambar = $request->file('image_product');
            $path = 'public/images/products';
            $ext = $gambar->getClientOriginalExtension();
            $nama = 'myproduct_' . Carbon::now('Asia/jakarta')->format('Ymdhis') . '.' . $ext; //myproduct_20251206103450.png
            $simpan['image'] = $nama;
            // menyimpan gambar ke storage : 
            $gambar->storeAs($path, $nama);
        }
        Product::create($simpan);
        return redirect()->route('product.index')->with('success', 'Product Created');
    }

    public function show($param)
    {
        $data = Product::where('slug', $param)->firstOrFail();
        $category = Category::all();
        return view('product.show', compact('data', 'category'));
    }

    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);

        $request->validate([
            'prod_name' => ['required', 'string', 'min:3', 'max:30'],
            'category' => ['required', 'integer'],
            'price_product' => ['required', 'numeric', 'min:500', 'max:99999999'],
            'stock_product' => ['required', 'integer', 'min:0', 'max:999'],
            'image_product' => ['file', 'mimes:png,jpg,jpeg,svg,webp,heic', 'max:5000'],
            'desc' => ['required']
        ]);
        // data yang harus disimpan : disesuaikan dengan database
        $simpan = [
            'category_id' => $request->input('category'),
            'product_name' => $request->input('prod_name'),
            'price' => $request->input('price_product'),
            'stock' => $request->input('stock_product'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->prod_name) . random_int(0, 9999)
        ];
        // kondisi saat ada nilai input file gambar
        if ($request->hasFile('image_product')) {

            $data_lama = 'public/images/products/' .$data->image;

            if($data->image && Storage::exists($data_lama))
            {
                Storage::delete($data_lama);
            }

            $gambar = $request->file('image_product');
            $path = 'public/images/products';
            $ext = $gambar->getClientOriginalExtension();
            $nama = 'myproduct_' . Carbon::now('Asia/jakarta')->format('Ymdhis') . '.' . $ext; //myproduct_20251206103450.png
            $simpan['image'] = $nama;
            // menyimpan gambar ke storage : 
            $gambar->storeAs($path, $nama);
        }

        $data->update($simpan);

        return redirect()->route('product.index')->with('success', 'Product Updated');

    }

}
