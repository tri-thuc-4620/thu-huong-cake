<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('variation_set_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', ['simple', 'variable'])->default('simple');
            $table->decimal('price', 12, 0)->default(0);
            $table->decimal('sale_price', 12, 0)->nullable();
            $table->date('sale_start')->nullable();
            $table->date('sale_end')->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->enum('stock_status', ['in_stock', 'out_of_stock', 'pre_order'])->default('in_stock');
            $table->boolean('manage_stock')->default(false);
            $table->integer('low_stock_threshold')->default(5);
            $table->integer('weight')->nullable();
            $table->string('prep_time')->nullable();
            $table->string('advance_order')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_new')->default(false);
            $table->integer('sort_order')->default(0);
            $table->integer('views')->default(0);
            $table->string('focus_keyword')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
