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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('branch_id');
            $table->string('branch_name');
            $table->string('orderID')->indexed(); //unique id for orders. 
            $table->string('fullname');
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->string('address', 500)->nullable();
            $table->string('location')->nullable(); //logitude and latitude
            $table->string('location_name')->nullable();
            $table->text('note')->nullable();
            $table->boolean('paid')->default(0);
            $table->boolean('online')->default(0); //online=1 or offline =0

            $table->decimal('total', 65, 2);
            $table->decimal('total_cost', 65, 2); //payable cost
            $table->decimal('vat', 65, 2)->default(0);
            
            $table->string('discount')->nullable();
            $table->string('discount_code')->nullable();
            $table->decimal('delivery_fee')->nullable();  
            
            $table->string('payment_method')->nullable();
            $table->string('payment_ref')->nullable(); 
            
            $table->boolean('is_pickup')->default(0);
            $table->string('pickup_time')->nullable();
            $table->string('pickup_date')->nullable(); 
            $table->tinyInteger('status')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
