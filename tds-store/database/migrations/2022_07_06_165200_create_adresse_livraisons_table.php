<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdresseLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresse_livraisons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->integer('telephone');
            $table->string('pays');
            $table->string('rue');
            $table->string('ville');
            $table->integer('code_postal');

            // $table->string('nomLivraison')->nullable();
            // $table->string('prenomLivraison')->nullable();
            // $table->string('emailLivraison')->nullable();
            // $table->integer('telephoneLivraison')->nullable();
            // $table->string('paysLivraison')->nullable();
            // $table->string('rueLivraison')->nullable();
            // $table->string('villeLivraison')->nullable();
            // $table->integer('code_postalLivraison')->nullable();

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
        Schema::dropIfExists('adresse_livraisons');
    }
}
