<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErsBalanceCheckTable extends Migration
{
    /**
     * Exécuter la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_second')->create('ers_balance_check', function (Blueprint $table) {
            $table->id(); // Ajout d'une clé primaire auto-incrémentée
            $table->timestamp('calculatedtime')->nullable(); // La colonne DATES
            $table->string('resellertype'); // Le type de revendeur
            $table->integer('nbre')->nullable(); // La colonne NBRE
            $table->decimal('bal', 15, 2)->nullable(); // La colonne BAL
            $table->integer('nbre14')->nullable(); // La colonne NBRE14
            $table->decimal('bal14', 15, 2)->nullable(); // La colonne BAL14
            $table->decimal('gap', 15, 2)->nullable(); // La colonne GAP
            $table->decimal('gapbal', 15, 2)->nullable(); // La colonne GAPBAL
            $table->timestamps(); // Les colonnes created_at et updated_at

            // Vous pouvez ajouter des index ou des clés uniques si nécessaire
        });
    }

    /**
     * Réaliser une opération de rollback de la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ers_balance_check');
    }
}
