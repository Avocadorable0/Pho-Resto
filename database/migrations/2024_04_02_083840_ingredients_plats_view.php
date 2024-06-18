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
            'CREATE VIEW ingredients_plats_view AS
            SELECT
            p."id",
            p."platNom",
            p."platImg",
            "ingredientsId",
            i."ingredientNom",
            pip."ingredientGramme" as quantite,
            i."ingredientPrixGramme" * pip."ingredientGramme" as prix,
            i."ingredientCalorieGramme" * pip."ingredientGramme" as calorie,
            (select sum(i3."ingredientCalorieGramme" * pip3."ingredientGramme")
            FROM plats__ingredients_plats as pip3
            JOIN ingredients as i3 ON i3.id = pip3."ingredientsId"
            WHERE pip3."ingredientsPlatsId" = p.id) as totalcalorie,
            (SELECT sum(i2."ingredientPrixGramme" * pip2."ingredientGramme")
            FROM plats__ingredients_plats as pip2
            JOIN ingredients as i2 ON i2.id = pip2."ingredientsId"
            WHERE pip2."ingredientsPlatsId" = p.id) as totalprix
            FROM
            plats__ingredients_plats as pip
            JOIN
            plats as p ON p.id = pip."ingredientsPlatsId"
            JOIN
            ingredients as i ON i.id = pip."ingredientsId"
            GROUP BY
            p."id", p."platNom", "ingredientsId", i."ingredientNom", pip."ingredientGramme", i."ingredientPrixGramme", i."ingredientCalorieGramme"');
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
