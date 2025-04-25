<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Creates the 'personal_access_tokens' table for storing API tokens with polymorphic relations, abilities, and usage metadata.
     *
     * Defines columns for token identification, association to various models, token value, abilities, usage timestamps, and standard Laravel timestamps.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Drops the personal_access_tokens table, reversing the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
