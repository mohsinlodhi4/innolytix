<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('subject')->nullable();
            $table->bigInteger('joborder_id')->unsigned();
            $table->bigInteger('officedetails_id')->unsigned();
            $table->integer('sub_total')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('grand_total')->nullable();
            $table->string('notes')->nullable();
            $table->bigInteger('bank_id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('joborder_id')->references('id')->on('job_orders');
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
        Schema::drop('invoices');
    }
}
