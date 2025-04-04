<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email', 191)->unique();
            $table->string('position');
            $table->string('departement');
            $table->date('hire_date');
            $table->integer('salary');
            $table->enum('statut', ['actif', 'en_conge', 'licenciee']);
            $table->timestamps(); // Ajout de la colonne created_at et updated_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}