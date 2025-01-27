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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists("order__items");
        Schema::dropIfExists("orders");
        Schema::create("orders", function (Blueprint $table) {
            $table->id();
            $table->string("full_adreess");
            $table->string("full_name");
            $table->string("phone");
            $table->string("email");
            $table->float("sub_total");
            $table->enum("status", [
                'pending',
                'shipping',
                'rejected',
                'delivered',
                'closed'
            ])->default('pending');
            $table->foreignId("user_id")->nullable()->constrained('users')->nullOnDelete();            
            $table->string("status_notes")->nullable();
            $table->string("total");
            $table->timestamps();
        });

        Schema::create("order__items", function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("orders")->cascadeOnDelete();
            $table->foreignId("product_id")->nullable()->constrained("products")->nullOnDelete();
            $table->string('product_name');
            $table->double('product_price');
            $table->double('sub_total');
            $table->unsignedBigInteger('quantity')->default(1);
            $table->string('chosen_color')->nullable();
            $table->string('chosen_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("order__items");
        Schema::dropIfExists("orders");
    }
};
