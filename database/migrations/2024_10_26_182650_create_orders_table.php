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
            $table->string('address');
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->string('location')->nullable(); //logitude and latitude
            $table->string('location_name');
            $table->text('note')->nullable();
            $table->boolean('paid')->default(0);
            $table->boolean('online')->default(0); //online=1 or offline =0
            $table->decimal('total', 65, 2);
            $table->decimal('vat', 65, 2)->default(0);
            $table->string('discount')->nullable();
            $table->decimal('delivery_fee')->nullable();  
            $table->string('payment_method')->nullable();
            $table->string('payment_ref')->nullable(); 
            
            $table->boolean('is_pickup')->default(0);
            $table->string('pick_up_time')->nullable();
            $table->string('pick_up_date')->nullable(); 
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
