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
        Schema::create('special_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rate_type_id')->constrained('rate_types'); // Asumiendo que la tabla relacionada se llama 'rate_types'
            $table->decimal('discount', 5, 2);
            $table->text('comment', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_rates');
    }
};
