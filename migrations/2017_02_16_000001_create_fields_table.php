<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_fields', function (Blueprint $table) {
            $table->increments('id');

            $table->string('owner_type')->nullable();
            $table->integer('owner_id')->nullable();

            $table->string('key');
            $table->json('value')->nullable();
            $table->json('description')->nullable();
            $table->json('translated')->nullable();

            $table->timestamps();

            $table->unique(['owner_type', 'owner_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laravel_fields');
    }
}
