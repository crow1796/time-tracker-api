<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIterationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iterations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')
                    ->unsigned();
            $table->string('name');
            $table->timestamp('started_at')
                    ->nullable();
            $table->timestamp('ended_at')
                    ->nullable();

            $table->foreign('project_id')
                    ->references('id')
                    ->on('projects')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('iterations');
    }
}
