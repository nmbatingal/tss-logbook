<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('services')->nullable();
            $table->string('other_services')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('mi')->nullable();
            $table->string('age_group')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('year_level')->nullable();
            $table->string('organization')->nullable();
            $table->string('organization_type')->nullable();
            $table->string('other_org_type')->nullable();
            $table->integer('province_code')->unsigned()->nullable();
            $table->integer('municipality_code')->unsigned()->nullable();
            $table->integer('barangay_code')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('province_code')->references('code')->on('provinces');
            $table->foreign('municipality_code')->references('code')->on('municipalities');
            $table->foreign('barangay_code')->references('code')->on('barangays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
