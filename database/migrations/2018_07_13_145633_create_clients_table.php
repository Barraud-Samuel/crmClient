<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clientName');
            $table->string('clientMail');
            $table->integer('priority');
            $table->string('status');
            $table->string('urlSite');
            $table->integer('numberParticipants');
            $table->text('clientComments');
            $table->string('country');
            $table->string('loginAdmin');
            $table->string('passwordAdmin');
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
        Schema::dropIfExists('clients');
    }
}
