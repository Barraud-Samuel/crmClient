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
            $table->string('clientName')->nullable();
            $table->string('clientMail')->nullable();
            $table->integer('priority')->nullable();
            $table->string('status')->nullable();
            $table->string('urlSite')->nullable();
            $table->integer('numberParticipants')->nullable();
            $table->text('clientComments')->nullable();
            $table->string('country')->nullable();
            $table->string('loginAdmin')->nullable();
            $table->string('passwordAdmin')->nullable();
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
