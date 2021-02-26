<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->uuid('program_id');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->uuid('project_status_id');
            $table->foreign('project_status_id')->references('id')->on('project_statuses');
            $table->boolean('is_planified');
            $table->date('init_date');
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
