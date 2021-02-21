<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleScopeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_scope', function (Blueprint $table) {
            $table->uuid('role_id');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade');
            $table->uuid('scope_id');
            $table->foreign('scope_id')->references('id')->on('scopes')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_scope');
    }
}
