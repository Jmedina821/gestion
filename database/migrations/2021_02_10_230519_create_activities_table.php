<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->mediumText('description')->nullable();
            $table->uuid('parroquia_id');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->boolean('gobernador')->default(false);
            $table->mediumText('conclusion')->nullable();
            $table->string('address');
            $table->date('init_date');
            $table->date('end_date')->nullable();
            $table->integer('estimated_population');
            $table->integer('benefited_population');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->decimal('budget_cost',14,2);
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
        Schema::dropIfExists('activities');
    }
}
