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
        Schema::create('type_fuels', function (Blueprint $table) {
            $table->id();
            $table->float('number_fuel');

            //Вид топлива
            $table->unsignedBigInteger('fuel_id');

            $table->index('fuel_id', 'type_fuel_fuel_idx');

            $table->foreign('fuel_id')->references('id')->on('fuels');

            //Пользователь, взявший топливо
            $table->unsignedBigInteger('user_id');

            $table->index('user_id', 'type_fuel_user_idx');

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_fuels');
    }
};
