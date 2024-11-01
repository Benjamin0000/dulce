<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->decimal('vat', 65, 3)->default(0); 
            $table->decimal('cost_per_km', 65, 2)->default(0); 
            $table->decimal('max_km', 65, 2)->default(0);
            $table->string('location')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn('vat'); 
            $table->dropColumn('cost_per_km'); 
            $table->dropColumn('max_km');
            $table->dropColumn('location'); 
        });
    }
};
