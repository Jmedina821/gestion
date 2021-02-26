<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMeasurementUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_measurement_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->uuid('measurement_unit_id');
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units');
            $table->string('observation')->nullable();
            $table->decimal('proposed_goal',12,2);
            $table->decimal('reached_goal',12,2)->nullable();
            $table->boolean('is_goal_increase')->default(false);
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
        Schema::dropIfExists('project_measurement_units');
    }
}
