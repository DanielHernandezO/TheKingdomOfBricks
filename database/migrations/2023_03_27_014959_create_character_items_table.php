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
        Schema::create('character_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('item_id');
            $table->string('type');

            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

            $table->unique(['character_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_items');
    }
};
