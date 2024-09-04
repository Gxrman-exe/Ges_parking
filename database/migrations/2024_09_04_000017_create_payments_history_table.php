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
        Schema::create('payments_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_payment')->constrained('payments');
            $table->decimal('mount_pay', 10, 2);
            $table->string('plate'); 
            $table->enum('payment_status', ['pending', 'processed', 'canceled']);
            $table->date('registration_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_history');
    }
};
