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
        Schema::create('advertisement_gems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisement_id')
                ->constrained('advertisements')
                ->onDelete('cascade');
            $table->foreignId('gem_id')->nullable()
                ->constrained('gems')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement_gems');
    }
};
