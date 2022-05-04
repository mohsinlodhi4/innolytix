<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('model_no')->nullable();
            $table->string('brand')->nullable();
            $table->integer('unitprice')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('total')->nullable();
            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->bigInteger('quotation_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('quotation_id')->references('id')->on('quotation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotation_products');
    }
}
