<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;
    protected $fillable = ['nama', 'url', 'categoryid', 'icon', 'masterid'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }
    //Self Relation wkwkwk
    public function mastermenu()
    {
        return $this->belongsTo(Menu::class, 'masterid');
    }

}
