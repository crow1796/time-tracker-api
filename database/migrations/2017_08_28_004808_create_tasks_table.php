<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iteration_id')
                    ->unsigned();
            $table->integer('project_id')
                    ->unsigned();
            $table->string('title')
                    ->nullable();
            $table->text('description')
                    ->nullable();
            $table->float('estimate')
                    ->nullable();

            $table->foreign('iteration_id')
                    ->references('id')
                    ->on('iterations')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('tasks');
    }
}
