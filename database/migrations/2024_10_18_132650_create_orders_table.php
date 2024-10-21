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
            $table->bigInteger('branch_id');
            $table->string('branch_name');
            $table->string('orderID'); //unique id for orders. 
            $table->string('fullname'); 
            $table->string('address'); 
            $table->string('mobile_number'); 
            $table->string('email')->nullable(); 
            $table->string('location')->nullable(); 
            $table->string('user_session'); 
            $table->text('note')->nullable(); 
            $table->boolean('paid')->default(0); 
            $table->boolean('online')->default(0); //online=1 or offline =0
            $table->decimal('total', 65, 2); 
            $table->string('payment_method'); 
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
