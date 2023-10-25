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
        Schema::create('nort_types', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('nort_id');

            $table->foreign('nort_id')->references('id')->on('notifications');

            $table->unsignedBigInteger('type_id');

            $table->index('type_id', 'nort_types_type_idx');

            $table->foreign('type_id')->references('id')->on('type_fuels');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nort_types');
    }
};
