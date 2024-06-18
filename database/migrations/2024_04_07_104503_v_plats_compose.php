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
            'CREATE View v_plat_compose as 
            SELECT
            pc."id",
            "platComposeNom",
            "platComposeImg",
            SUM(v_plat."totalcalorie"*pcp."quantite" + (SELECT SUM(i2."ingredientCalorieGramme" * pi2."ingredientGramme")
                                        FROM plats_compose_ingredient as pi2
                                        JOIN ingredients as i2 ON i2."id" = pi2."ingredientId"
                                        WHERE pi2."platComposeId" = pc."id")) as calorieTotal,
            SUM(v_plat."totalprix"*pcp."quantite" + (SELECT SUM(i1."ingredientPrixGramme" * pi1."ingredientGramme")
                                        FROM plats_compose_ingredient as pi1
                                        JOIN ingredients as i1 ON i1."id" = pi1."ingredientId"
                                        WHERE pi1."platComposeId" = pc."id")) as prixPlatCompose
        FROM
            plats_compose as pc
        JOIN
            plats_compose_plat as pcp ON pcp."platComposeId" = pc."id"
        JOIN
            ingredients_plats_view as v_plat ON v_plat."id" = pcp."platId"
        GROUP BY
            pc."id", "platComposeNom", "platComposeImg"'
        );
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
