<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //@TODO: When ServiceOrder is created, finish this migration
        
        // Schema::create('user_reviews', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignUlid('reviewed_user_id')->constrained('users')->index();
        //     $table->foreignUlid('reviewer_user_id')->constrained('users')->index();
        //     $table->foreignUlid('service_order_id')->constrained('service_orders')->index();
        //     $table->text('description');
        //     $table->unsignedTinyInteger('rating');
        //     $table->boolean('is_done')->default(false)->index();
        //     $table->boolean('is_visible')->default(true);
        //     $table->timestamps();

        //     $table->unique(['reviewed_user_id', 'reviewer_user_id']);
        // });
    }

    public function down(): void
    {
        // Schema::dropIfExists('user_reviews');
    }
};
