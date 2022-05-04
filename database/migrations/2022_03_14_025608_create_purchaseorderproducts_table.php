<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseorderproductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorderproducts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('model');
            $table->string('brand');
            $table->bigInteger('unitprice');
            $table->bigInteger('qty');
            $table->bigInteger('total');
            $table->bigInteger('purchaseorder_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('purchaseorder_id')->references('id')->on('purchase_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchaseorderproducts');
    }
}
