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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('medicine_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('quantity')->default(0);
            $table->integer('min_quantity')->default(0); // จุดเตือนใกล้หมด

            $table->timestamps();

            $table->unique(['warehouse_id', 'medicine_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
