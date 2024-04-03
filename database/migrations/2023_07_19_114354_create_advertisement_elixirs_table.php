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
        Schema::create('advertisement_elixirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisement_id')
                ->constrained('advertisements')
                ->onDelete('cascade');
            $table->foreignId('elixir_id')->nullable()
                ->constrained('elixirs')
                ->onDelete('set null');
            $table->string('title');
            $table->string('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement_elixirs');
    }
};
