<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;
    protected $table = "m_status";
    protected $fillable = ['nama'];
 
    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'categoryid');
    // }
}
