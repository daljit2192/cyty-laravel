<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateServiceProviderTable.
 */
class CreateServiceProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_provider', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('contractor_type');
            $table->integer('job_category');
            $table->string('skill');
            $table->string('tag_line');
            $table->string('description');
            $table->string('experience');
            $table->string('portfolio');
            $table->string('price');
            $table->string('avalaibility');
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->Integer('created_by')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('service_provider');
    }
}
