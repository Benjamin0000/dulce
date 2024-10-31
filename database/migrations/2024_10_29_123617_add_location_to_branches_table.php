<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            // Add VAT, cost per km, and max km columns
            $table->decimal('vat', 65, 3)->default(0); 
            $table->decimal('cost_per_km', 65, 2)->default(0); 
            $table->decimal('max_km', 65, 2)->default(0);
        });

        // Add nullable POINT column for location with spatial index
        DB::statement('ALTER TABLE branches ADD location POINT NULL');
        DB::statement('ALTER TABLE branches ADD SPATIAL INDEX location_spatial_index(location)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn('vat'); 
            $table->dropColumn('cost_per_km'); 
            $table->dropColumn('max_km'); 
        });

        // Drop the spatial index and location column
        DB::statement('ALTER TABLE branches DROP INDEX location_spatial_index');
        DB::statement('ALTER TABLE branches DROP COLUMN location');
    }
};
