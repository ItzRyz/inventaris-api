<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;
    protected $fillable = ['transcode', 'transdate', 'remark', 'qty', 'categoryid'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }
}