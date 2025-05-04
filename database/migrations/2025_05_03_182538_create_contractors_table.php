<?php

use App\States\Contractor\Created;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained();
            $table->string('name', 200)->nullable();
            $table->string('document', 20)->unique()->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->string('status', 50)->default(Created::$name);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contractors');
    }
};
