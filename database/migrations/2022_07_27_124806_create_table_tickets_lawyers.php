<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTicketsLawyers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_lawyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_id_caso');
            $table->unsignedBigInteger('fk_id_abogado');
            $table->timestamps();

            // Add foreign keys
            $table->foreign('fk_id_caso')
                    ->references('id')
                    ->on('tickets')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('fk_id_abogado')
                    ->references('id')
                    ->on('users')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_lawyers');
    }
}
