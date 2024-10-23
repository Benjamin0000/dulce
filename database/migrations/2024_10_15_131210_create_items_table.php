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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->indexed(); 
            $table->string('name');
            $table->string('logo')->nullable();
            $table->integer('parent_id')->nullable()->indexed();
            $table->decimal('cost_price', 65, 2)->default(0);
            $table->decimal('selling_price', 65, 2)->default(0);
            $table->integer('total')->default(0);
            $table->integer('sold')->default(0);  
            $table->boolean('type')->default(0);  //either a category or an item
            // $table->text('add_ons')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
