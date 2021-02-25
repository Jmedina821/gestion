<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('value', 14, 2);
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->boolean('is_budget_increase')->default(false);
            $table->string('observation')->nullable();
            $table->uuid('budget_source_id');
            $table->foreign('budget_source_id')->references('id')->on('budget_sources');
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
        Schema::dropIfExists('budgets');
    }
}
