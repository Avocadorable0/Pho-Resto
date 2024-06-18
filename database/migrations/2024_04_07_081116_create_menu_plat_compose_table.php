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
        Schema::create('menu_plat_compose', function (Blueprint $table) {
            $table->integer('menuId');
            $table->integer('platComposeId');
            $table->foreign('menuId')->references('id')->on('menu');
            $table->foreign('platId')->references('id')->on('plats');
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
        Schema::dropIfExists('menu_plat_compose');
    }
};
