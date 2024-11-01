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
            // Define the location column as nullable
            DB::statement("ALTER TABLE branches ADD location POINT NULL DEFAULT ST_GeomFromText('POINT(0 0)')");
            $table->decimal('vat', 65, 3)->default(0); 
            $table->decimal('cost_per_km', 65, 2)->default(0); 
            $table->decimal('max_km', 65, 2)->default(0);
        });
        // Optional: Add a spatial index if needed
        DB::statement("ALTER TABLE branches ADD SPATIAL INDEX location_spatial_index(location)");
    }

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
