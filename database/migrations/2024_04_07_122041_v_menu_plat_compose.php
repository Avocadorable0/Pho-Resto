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
        DB::statement(
            'CREATE view v_menu_plat_compose as
            select 
                mp."menuId",
                vpc."id",
                vpc."platComposeNom",
                vpc."calorietotal",
                vpc."prixplatcompose"
            from menu_plat_compose as mp
            join v_plat_compose as vpc on vpc."id" = mp."platComposeId" 
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
