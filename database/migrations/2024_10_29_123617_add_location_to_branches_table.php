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
            // Add the location column with a default value
            // You can either add the column in this way or separate it into its own statement
            DB::statement('ALTER TABLE branches ADD location POINT NOT NULL DEFAULT ST_GeomFromText(\'POINT(0 0)\')');

            // Add the spatial index on the location column
            DB::statement('ALTER TABLE branches ADD SPATIAL INDEX location_spatial_index(location)');
            // Add the new vat column
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
            // Drop the vat column
            $table->dropColumn('vat'); 

            // Drop the spatial index on the location column
            DB::statement('ALTER TABLE branches DROP INDEX location_spatial_index');

            // Drop the location column
            DB::statement('ALTER TABLE branches DROP COLUMN location');
        });
    }
};
