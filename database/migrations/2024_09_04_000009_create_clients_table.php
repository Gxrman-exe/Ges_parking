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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('names', 50);
            $table->string('surnames', 50);
            $table->string('document_type', 30);
            $table->string('document', 11)->unique();
            $table->string('e_mail', 70)->unique();
            $table->string('phone_number', 20)->nullable();
            $table->string('direction', 100);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
