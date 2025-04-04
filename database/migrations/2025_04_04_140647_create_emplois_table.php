<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('requirements');
            $table->string('salary_range')->nullable();
            $table->string('location');
            $table->string('department');

            // Statut : brouillon, publiée, fermée
            $table->enum('status', ['brouillon', 'publiee', 'fermee'])->default('brouillon');

            // Lien vers l'employé qui a créé ou gère l'offre
            $table->unsignedBigInteger('recruiter_id');
            $table->foreign('recruiter_id')->references('id')->on('employers')->onDelete('cascade');

            $table->date('deadline')->nullable(); // Date limite de candidature
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
        Schema::dropIfExists('emplois');
    }
}
