<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;
    protected $table = "t_inv";
    protected $fillable = ['transcode', 'transdate', 'remark', 'qty', 'categoryid', 'createdby'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'createdby');
    }

    public static function getLastCode($year, $month, $day)
    {
        $datePrefix = "{$year}/{$month}/{$day}";
        $lastCode = self::where('transcode', 'like', "INV/{$datePrefix}/%")
            ->orderBy('transcode', 'desc')
            ->value('transcode');

        if ($lastCode) {
            $lastNumber = (int) substr($lastCode, strrpos($lastCode, '/') + 1);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        return "INV/{$datePrefix}/{$newNumber}";
    }
    
}
