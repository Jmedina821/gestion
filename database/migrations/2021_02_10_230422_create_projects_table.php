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
            $table->uuid('investment_area_id');
            $table->foreign('investment_area_id')->references('id')->on('investment_areas');
            $table->uuid('measurement_id');
            $table->foreign('measurement_id')->references('id')->on('measurements');
            $table->uuid('project_status_id');
            $table->foreign('project_status_id')->references('id')->on('project_statuses');
            $table->decimal('measurement_value');
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
