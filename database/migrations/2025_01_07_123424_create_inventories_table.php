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
        Schema::create('t_inv', function (Blueprint $table) {
            $table->id();
            $table->string('transcode')->unique();
            $table->date('transdate');
            $table->string('remark');
            $table->string('categoryid')->constrained('m_category')->onDelete('cascade');
            $table->string('createdby')->constrained('m_user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_inv');
    }
};
