<?php

declare(strict_types=1);

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
        Schema::create('contractor_service_categories', function (Blueprint $table) {
            $table->foreignUlid('contractor_id')->constrained('contractors');
            $table->foreignId('service_category_id')->constrained('service_categories');

            $table->unique(['contractor_id', 'service_category_id'], 'contractor_service_categories_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractor_service_categories');
    }
};
