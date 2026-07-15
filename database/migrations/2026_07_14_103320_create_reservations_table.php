<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->foreignId('formula_id')->constrained('formulas')->cascadeOnDelete();
            $table->foreignId('terrain_id')->constrained('terrains')->cascadeOnDelete();
            $table->date('reservation_date');
            $table->time('start_time');
            $table->unsignedSmallInteger('players_count');
            $table->decimal('total_price', 8, 2);
            $table->decimal('deposit', 8, 2)->default(0);
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('customer_email');
            $table->index('reservation_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};