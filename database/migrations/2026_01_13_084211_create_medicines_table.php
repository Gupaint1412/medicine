<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();   // para, cpm
            $table->string('name');             // ชื่อยา
            $table->string('unit');             // เม็ด, ขวด
            $table->string('dose');             // 500 mg, 100 ml
            $table->decimal('price', 10, 2);    // ราคาต่อหน่วย (ใช้ราคาเดียวก่อน)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
