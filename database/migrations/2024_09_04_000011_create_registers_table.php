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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->string('user_code', 20)->nullable();
            $table->boolean('have_permission')->true;
            $table->string('action_performed');
            $table->date('date');
            $table->string('module_code', 20)->nullable();
            $table->timestamp('date_time_admission')->nullable();
            $table->timestamp('date_time_exit')->nullable(); 
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
