<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransectionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transections', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('joborder_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->bigInteger('bank_id')->unsigned()->nullable();
            $table->string('cheque_no')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('joborder_id')->references('id')->on('job_orders');
            $table->foreign('bank_id')->references('id')->on('banks');
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
        Schema::drop('transections');
    }
}
