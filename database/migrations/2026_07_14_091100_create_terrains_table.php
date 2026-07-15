<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_indoor')->default(false);

            $table->unsignedSmallInteger('min_players')->default(2);
            $table->unsignedSmallInteger('max_players')->default(12);

            $table->unsignedSmallInteger('setup_time')->default(15);
            $table->unsignedSmallInteger('cleanup_time')->default(10);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terrains');
    }
};
