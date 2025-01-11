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
        Schema::create('t_inv_dt', function (Blueprint $table) {
            $table->id();
            $table->string('headerid')->constrained('t_inv')->onDelete('cascade');
            $table->string('productid')->constrained('m_product')->onDelete('cascade');
            $table->string('statusid')->constrained('m_status')->onDelete('cascade');
            $table->string('remark');
            $table->string('pjid')->constrained('m_pj')->onDelete('cascade');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_inv_dt');
    }
};
