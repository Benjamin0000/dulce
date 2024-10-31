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
            // Add columns for VAT, cost per km, and max km
            $table->decimal('vat', 65, 3)->default(0); 
            $table->decimal('cost_per_km', 65, 2)->default(0); 
            $table->decimal('max_km', 65, 2)->default(0);

            // Add location column as POINT type, nullable
            $table->point('location')->nullable();

            // Add spatial index on location column
            DB::statement('ALTER TABLE branches ADD SPATIAL INDEX location_spatial_index(location)');
        });

        // Optionally, set location to POINT(0 0) for existing records
        DB::table('branches')->whereNull('location')->update([
            'location' => DB::raw("ST_GeomFromText('POINT(0 0)')")
        ]);
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

            // Drop the spatial index on the location column
            DB::statement('ALTER TABLE branches DROP INDEX location_spatial_index');

            // Drop the location column
            $table->dropColumn('location');
        });
    }
};
