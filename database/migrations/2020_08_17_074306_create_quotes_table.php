<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('quote_id');
            $table->integer('customer_id');
            $table->decimal('grand_total');
            $table->decimal('grand_total_incl_tax');
            $table->decimal('tax');
            $table->decimal('shipping_amount');
            $table->decimal('shipping_amount_incl_tax');
            $table->decimal('transaction_amount');
            $table->string('payment_method');
            $table->string('shipping_method');
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
        Schema::dropIfExists('quotes');
    }
}