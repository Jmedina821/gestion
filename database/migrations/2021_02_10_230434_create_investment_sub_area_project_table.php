<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentSubAreaProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_sub_area_project', function (Blueprint $table) {
            $table->id();
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->uuid('investment_sub_area_id');
            $table->foreign('investment_sub_area_id')->references('id')->on('investment_sub_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investment_areas_projects');
    }
}
