<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id'); // Supprime la colonne id
        });

        Schema::table('users', function (Blueprint $table) {
            $table->bigIncrements('numero'); // Ajoute numero comme clé primaire auto-incrémentée
        });

        // Définir l'auto-incrémentation à 1001
        \DB::statement("ALTER TABLE users AUTO_INCREMENT = 1001;");
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('numero');
            $table->id(); // Remet l'ID par défaut en cas de rollback
        });
    }
};
