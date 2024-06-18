<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plats__ingredients_plats', function (Blueprint $table) {
            $table->integer('ingredientsPlatsId');
            $table->integer('ingredientsId');
            $table->double('ingredientGramme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plats__ingredients_plats');
    }
};
