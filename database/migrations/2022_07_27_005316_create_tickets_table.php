<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_id_cliente');
            // $table->unsignedBigInteger('fk_id_abogado')->nullable();
            // $table->bigInteger('fk_id_abogado')->unsigned()->nullable();
            $table->char('nombre_caso', 50);
            $table->date('fecha_inicio')->nullable();
            $table->char('estado_caso', 30);
            $table->date('fecha_arcfin')->nullable();
            $table->string('descripcion');
            $table->timestamps();

            // Add foreignkeys
            $table->foreign('fk_id_cliente')
                    ->references('id')
                    ->on('people')
                    ->constrained()
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            /*
            $table->foreign('fk_id_abogado')
                    ->references('id')
                    ->on('users')
                    ->constrained()
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
