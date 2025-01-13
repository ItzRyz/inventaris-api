<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $table = "m_product";
    protected $fillable = ['nama', 'categoryid', 'deskripsi'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }
}
