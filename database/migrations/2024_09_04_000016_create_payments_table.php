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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id')->constrained('payments_methods');                
            $table->foreignId('special_rate_id')->constrained('special_rates');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->date('payment_date');
            $table->decimal('paid_amount', 10, 2);
            $table->enum('payment_status', ['pending', 'processed', 'failed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
