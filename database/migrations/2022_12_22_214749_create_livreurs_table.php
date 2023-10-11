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
        Schema::create('livreurs', function (Blueprint $table) {
            $table->id();
            $table->string('cin');
            $table->string('nom',150);
            $table->string('prenom',150);
            $table->string('photo');
            $table->string('email',150)->unique();
            $table->string('adresse',100)->unique();
            $table->string('tel',100)->unique();
            $table->string('typepermis',150);
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
        Schema::dropIfExists('livreurs');
    }
};