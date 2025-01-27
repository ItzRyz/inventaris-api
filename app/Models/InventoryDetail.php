<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetail extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryDetailFactory> */
    use HasFactory;
    protected $table = "t_inv_dt";

    protected $fillable = ['headerid', 'productid', 'statusid', 'remark', 'pjid', 'qty'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'headerid');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'productid');
    }
    public function status()
    {
        return $this->belongsTo(Inventory::class, 'statusid');
    }
    public function pj()
    {
        return $this->belongsTo(PJ::class, 'pjid');
    }
}
