<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded; // masassiginable tanpa perlu memanggil field yang harus diisi 
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
