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
            'CREATE VIEW v_plat_compositions as                        
            select 
                pci."platComposeId",
                pci."ingredientId",
                i."ingredientNom",
                pci."ingredientGramme"
            from plats_compose_ingredient as pci
            join ingredients as i on i."id" = pci."ingredientId"
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
