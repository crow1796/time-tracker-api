<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_task', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')
                    ->unsigned();
            $table->integer('tasks_id')
                    ->unsigned();
            $table->foreign('project_id')
                    ->references('id')
                    ->on('projects');
            $table->foreign('tasks_id')
                    ->references('id')
                    ->on('tasks')
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
        Schema::dropIfExists('project_task');
    }
}
