<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->integer('numero')->default(1001);
        $table->string('firstname');
        $table->string('mailpro')->nullable();
        $table->string('telephone')->nullable();
        $table->enum('fonction', ['Amb', 'SMUR', 'Inf SMUR']);
        $table->enum('metier', ['ADE', 'IDE', 'IADE', 'IPDE', 'Cadre', 'Medecin', 'ARM', 'interne']);
        $table->enum('bureau', ['ParamedSMUR', 'Med SMUR', 'SAMU', 'Cadre']);
        $table->timestamp('last_login')->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['numero', 'firstname', 'mailpro', 'telephone', 'fonction', 'metier', 'bureau', 'last_login']);
    });
}

};
