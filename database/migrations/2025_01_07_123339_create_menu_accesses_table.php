<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_menu_access', function (Blueprint $table) {
            $table->id();
            $table->string('menuid')->constrained('m_menu')->onDelete('cascade');
            $table->string('rolesid')->constrained('m_roles')->onDelete('cascade');
            $table->boolean('iscreate');
            $table->boolean('isread');
            $table->boolean('isupdate');
            $table->boolean('isdelete');
            $table->boolean('isspecial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_menu_access');
    }
};
