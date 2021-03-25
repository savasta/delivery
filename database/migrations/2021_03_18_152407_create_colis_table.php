<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fournisseur_id')->nullable();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
            $table->string("nomclient")->nullable();
            $table->string("prenom")->nullable();;
            $table->string("adresseclient");
            $table->integer("codepostale");
            $table->bigInteger("numclient");
            $table->string("gouvernorat");
            $table->bigInteger("numclient2");
            $table->integer("cr");
            $table->string("service");
            $table->float("poid");
            $table->float("taille");
            $table->integer("nbrpiece");
            $table->text("remarque");
            $table->string("etat")->default('crée');
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
        Schema::dropIfExists('colis');
    }
}
