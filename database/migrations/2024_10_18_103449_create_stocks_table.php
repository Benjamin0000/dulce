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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id');
            $table->bigInteger('item_id')->nullable(); 
            $table->string('name'); 
            $table->decimal('cost_price', 65, 2); 
            $table->decimal('selling_price', 65, 2); 
            $table->integer('qty'); 
            $table->integer('sold')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
