<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJ extends Model
{
    /** @use HasFactory<\Database\Factories\PJFactory> */
    use HasFactory;
    protected $table = "m_pj";
    protected $fillable = ['kode', 'nama', 'lokasi'];

}
