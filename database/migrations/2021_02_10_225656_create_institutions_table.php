<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->mediumText('mision')->nullable();
            $table->mediumText('vision')->nullable();
            $table->string('name')->unique();
            $table->string("code");
            $table->string('parent_id')->nullable();
            $table->uuid('sector_id')->nullable();
            $table->foreign('sector_id')->references('id')
                ->on('sectors')->onDelete('set null');
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
        Schema::dropIfExists('institution');
    }
}
