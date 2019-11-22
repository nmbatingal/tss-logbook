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
            $table->string('services');
            $table->string('other_services')->nullable();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('mi')->nullable();
            $table->string('age_group');
            $table->string('gender');
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('organization');
            $table->string('organization_type');
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
