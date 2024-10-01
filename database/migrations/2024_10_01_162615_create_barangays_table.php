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
        if (Schema::hasTable('barangays')) {
            return;
        }

        Schema::create('barangays', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('old_code')->nullable();
            $table->string('region_code');
            $table->string('province_code');
            $table->string('municipality_code');
            $table->string('sub_municipality_code');
            $table->string('barangay_code');
            $table->string('name');
            $table->string('old_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('barangays');
    }
};
