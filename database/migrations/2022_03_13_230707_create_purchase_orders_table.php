<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('joborder_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->bigInteger('officedetail_id')->unsigned();
            $table->string('reference_no');
            $table->date('date');
            $table->string('payment_terms');
            $table->bigInteger('sub_total');
            $table->float('tax')->default(0);
            $table->bigInteger('grand_total');
            $table->bigInteger('bank_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('joborder_id')->references('id')->on('job_orders');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('officedetail_id')->references('id')->on('office_details');
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchase_orders');
    }
}
