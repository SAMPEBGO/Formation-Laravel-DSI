<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificationTableMinisteres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ministeres', function (Blueprint $table) {
            //changer designation en nom
            $table->renameColumn('désignation', 'nom');
            $table->string('boite_postal');
            $table->dropColumn('tel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ministeres', function (Blueprint $table) {
            //
        });
    }
}
