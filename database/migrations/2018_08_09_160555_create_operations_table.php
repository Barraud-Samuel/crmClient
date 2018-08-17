<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('url')->nullable();
            $table->string('lang')->nullable();
            $table->string('langSecond')->nullable();
            $table->integer('numberParticipants')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('operations');
    }
}
