<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinisteresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministeres', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('désignation');
            $table->text('ministre');
            $table->integer('adresse');
            $table->integer('tel');
            $table->datetime('date_nomination');
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
        Schema::dropIfExists('ministeres');
    }
}
