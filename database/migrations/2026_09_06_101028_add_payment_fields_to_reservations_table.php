<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('payment_method')->default('bank_transfer')->after('status');
            $table->string('payment_option')->default('deposit_30')->after('payment_method');
            $table->decimal('amount_paid', 8, 2)->default(0)->after('payment_option');
            $table->timestamp('paid_at')->nullable()->after('amount_paid');
            $table->string('payment_status')->default('pending')->after('paid_at');
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn([
                'payment_method',
                'payment_option',
                'amount_paid',
                'paid_at',
                'payment_status',
            ]);
        });
    }
};