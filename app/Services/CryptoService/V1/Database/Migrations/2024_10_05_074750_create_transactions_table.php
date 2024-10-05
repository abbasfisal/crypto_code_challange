<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // کاربر داخلی
            $table->foreignId('wallet_id')->constrained('wallets'); // ولت داخلی
            $table->foreignId('currency_id')->constrained('currencies'); // اشاره به جدول currency برای ارز تراکنش
            $table->decimal('amount', 18, 8); // مبلغ تراکنش
            $table->string('type'); // نوع تراکنش (deposit, withdrawal )
//            $table->string('status'); // وضعیت تراکنش
//
//            $table->string('external_wallet_address')->nullable(); // آدرس ولت خارجی
//            $table->string('external_transaction_id')->nullable(); // شناسه تراکنش خارجی
//            $table->decimal('network_fee', 18, 8)->nullable(); // هزینه شبکه
//            $table->decimal('exchange_rate', 18, 8)->nullable(); // نرخ تبدیل ارز
//            $table->unsignedBigInteger('destination_currency_id')->nullable(); // ارز مقصد

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
