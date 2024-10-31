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
        // Step 1: Create the location column without a default value
        DB::statement("ALTER TABLE branches ADD location POINT NOT NULL");

        // Step 2: Set default value to POINT(0 0) for existing records
        DB::statement("UPDATE branches SET location = ST_GeomFromText('POINT(0 0)') WHERE location IS NULL");

        // Add spatial index
        DB::statement("ALTER TABLE branches ADD SPATIAL INDEX location_spatial_index(location)");

        Schema::table('branches', function (Blueprint $table) {
            $table->decimal('vat', 65, 3)->default(0); 
            $table->decimal('cost_per_km', 65, 2)->default(0); 
            $table->decimal('max_km', 65, 2)->default(0);
        });
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

        DB::statement("ALTER TABLE branches DROP INDEX location_spatial_index");
        DB::statement("ALTER TABLE branches DROP COLUMN location");
    }
};
