<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revervas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_da_mesa');
            $table->foreignIdFor(User::class, 'id_usuario');
            $table->time('horario');
            $table->date('dia');
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
        Schema::dropIfExists('revervas');
    }
};
