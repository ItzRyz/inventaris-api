<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;
    protected $table = "t_inv";
    protected $fillable = ['transcode', 'transdate', 'remark', 'qty', 'categoryid'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'createdby');
    }
}
