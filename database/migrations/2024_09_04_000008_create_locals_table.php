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
        Schema::create('locals', function (Blueprint $table) {
            $table->id(); // Esta columna será AUTO_INCREMENT y PRIMARY KEY
            $table->foreignId('city_id')->constrained('cities');
            $table->string('local_name', 50);
            $table->string('nit', 20);
            $table->string('direction', 70);
            $table->boolean('active')->true;
            $table->boolean('iva_enabled')->true;
            $table->decimal('iva_percentage', 5, 2)->nullable();
            $table->string('local_code', 30)->unique();
            $table->decimal('rate_time', 8, 2)->nullable();
            $table->string('license_type', 30);
            $table->string('license', 30);
            $table->decimal('rate_value', 8, 2)->nullable();
            $table->integer('max_output_time')->nullable();
            $table->integer('available_spaces')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
