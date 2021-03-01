<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("second_name");
            $table->string("email");
            $table->string("phone");
            $table->string("objective");
            $table->longText("description");
            $table->string("center");
            $table->string("service");
            $table->string("fromwho");
            $table->boolean("accepted");
            $table->boolean('replied');
            $table->longText("response")->nullable();
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
        Schema::dropIfExists('solicituds');
    }
}
