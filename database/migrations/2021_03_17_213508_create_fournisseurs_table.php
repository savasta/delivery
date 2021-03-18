<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('nomsociete')->nullable();
            $table->string('expediteur')->nullable();
            $table->integer('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('adresse_livraison')->nullable();
            $table->string('adresse')->nullable();
            $table->string('gouvernorat')->nullable();
            $table->integer('prix_livraison')->nullable();
            $table->integer('prix_retour')->nullable();
            $table->string('mdp')->nullable();
            $table->string('proofcin')->nullable();
            $table->string('proofpatente')->nullable();
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
        Schema::dropIfExists('fournisseurs');
    }
}
