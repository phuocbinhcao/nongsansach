<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('consignment_symbol');
            $table->string('consignment_name');
            $table->date('consignment_expiry');
            $table->decimal('consignment_purchase_price',10);
            $table->decimal('consignment_sale_price',10);
            $table->integer('consignment_quantity');
            $table->integer('consignment_saled')->default(0);
            $table->integer('consignment_return')->default(0);
            $table->integer('consignment_currently');
            $table->string('consignment_status')->default('Còn hàng');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('active');
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
        Schema::dropIfExists('warehouses');
    }
}
