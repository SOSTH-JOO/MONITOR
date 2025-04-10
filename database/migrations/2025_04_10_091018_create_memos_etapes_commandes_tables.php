<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosEtapesCommandesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table memo
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('explication_titre');
            $table->timestamps();
        });

        // Table etape
        Schema::create('etapes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memo_id')->constrained('memos')->onDelete('cascade'); // Relation avec memo
            $table->string('nom_etape');
            $table->string('texte_etape');
            $table->timestamps();
        });

        // Table commande
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etape_id')->constrained('etapes')->onDelete('cascade'); // Relation avec etape
            $table->string('commande');
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
        Schema::dropIfExists('commandes');
        Schema::dropIfExists('etapes');
        Schema::dropIfExists('memos');
    }
}
