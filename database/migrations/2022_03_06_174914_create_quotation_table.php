<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->longText('subject')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('grand_total')->nullable();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('officedetails_id')->unsigned();
            $table->bigInteger('created_by')->unsigned();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('officedetails_id')->references('id')->on('office_details');
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
        Schema::drop('quotation');
    }
}
