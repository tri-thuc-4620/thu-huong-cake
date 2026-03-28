<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->enum('delivery_type', ['delivery', 'pickup']);
            $table->text('delivery_address')->nullable();
            $table->foreignId('pickup_store_id')->nullable();
            $table->date('delivery_date')->nullable();
            $table->time('delivery_time')->nullable();
            $table->text('note')->nullable();
            $table->string('gift_recipient_name')->nullable();
            $table->string('gift_recipient_phone')->nullable();
            $table->decimal('subtotal', 12, 0)->default(0);
            $table->decimal('shipping_fee', 12, 0)->default(0);
            $table->decimal('discount', 12, 0)->default(0);
            $table->decimal('total', 12, 0)->default(0);
            $table->enum('payment_method', ['bank_transfer', 'cod'])->nullable();
            $table->enum('status', ['pending', 'confirmed', 'processing', 'shipping', 'delivered', 'completed', 'cancelled'])->default('pending');
            $table->text('cancel_reason')->nullable();
            $table->text('admin_note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
