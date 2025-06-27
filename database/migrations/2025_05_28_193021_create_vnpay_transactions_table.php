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
        Schema::create('vnpay_transactions', function (Blueprint $table) {
        $table->id();
        $table->integer('order_id');             // Mã đơn hàng của bạn
        $table->decimal('amount', 15, 2);           // Số tiền giao dịch (đơn vị VND)
        $table->string('bank_code')->nullable(); 
        $table->string('transaction_no')->nullable(); // Mã giao dịch bên VNPAY
        $table->string('response_code')->nullable();  // Mã phản hồi (00 là thành công)
        $table->timestamps(); // created_at, updated_at
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vnpay_transactions');
    }
};
