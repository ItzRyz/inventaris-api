<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAccess extends Model
{
    /** @use HasFactory<\Database\Factories\MenuAccessFactory> */
    use HasFactory;
    protected $fillable = ['menuid', 'rolesid', 'iscreate', 'isread', 'isupdate', 'isdelete', 'isspecial'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menuid');
    }
    public function roles()
    {
        return $this->belongsTo(Roles::class, 'rolesid');
    }
}
