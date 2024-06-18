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
            'CREATE view v_menu_plat as
                select 
                    mp."menuId",
                    ipv."id",
                    ipv."platNom",
                    ipv."totalcalorie",
                    ipv."totalprix"
                from menu_plat as mp
                join ingredients_plats_view as ipv on ipv."id" = mp."platId"
                group by mp."menuId",  ipv."id",ipv."platNom",    ipv."totalcalorie",    ipv."totalprix"
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
