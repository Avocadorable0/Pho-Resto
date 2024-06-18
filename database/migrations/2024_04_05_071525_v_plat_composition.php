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
            'CREATE VIEW v_plat_composition as                        
            select 
                pcp."platComposeId",
                pcp."platId",
                p."platNom",
                pcp."quantite"
            from plats_compose_plat as pcp
            join plats as p on p."id"=pcp."platId"
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
