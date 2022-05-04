<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('address');
            $table->string('phone');
            $table->string('ntn_no');
            $table->string('strn_no');
            $table->bigInteger('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('office_details');
    }
}
