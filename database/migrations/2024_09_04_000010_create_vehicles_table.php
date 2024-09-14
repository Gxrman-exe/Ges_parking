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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('local_id')->constrained('locals');
            $table->foreignId('client_id')->constrained('clients')->nullable();
            $table->string('plate', 6)->unique();
            $table->string('vehicle_type', 30);
            $table->boolean('locker_use');
            $table->decimal('additional_value_locker', 8, 2)->nullable();
            $table->boolean('helmet_use'); 
            $table->decimal('additional_value_case', 8, 2)->nullable();
            $table->string('vehicle_status',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
