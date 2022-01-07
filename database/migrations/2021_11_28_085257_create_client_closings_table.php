<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientClosingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_closings', function (Blueprint $table) {
            $table->id();
            $table->string('scrip_code');
            $table->string('scrip_name');
            $table->decimal('ast',15,2)->nullable();
            $table->decimal('price',15,2)->nullable();
            $table->string('ot')->nullable();
            $table->date('expiry_date')->nullable();
            $table->decimal('purchase_qty',15,2)->nullable();
            $table->decimal('purchase_value',15,2)->nullable();
            $table->decimal('purchase_avg',15,2)->nullable();
            $table->decimal('sales_qty',15,2)->nullable();
            $table->decimal('sales_value',15,2)->nullable();
            $table->decimal('sales_avg',15,2)->nullable();
            $table->decimal('net_qty',15,2)->nullable();
            $table->decimal('net_value',15,2)->default(0)->nullable();
            $table->decimal('net_avg',15,2)->default(0)->nullable();
            $table->decimal('market_rate',15,2)->nullable();
            $table->decimal('market_value',15,2)->nullable();
            $table->decimal('today_pl',15,2)->nullable();
            $table->decimal('p_l',15,2)->nullable();
            $table->decimal('cross_currency',15,2)->nullable();

            $table->unsignedBigInteger('posted_to')->unsigned();
            $table->foreign('posted_to')->references('id')
                ->on('users')
                ->onDelete('restrict');
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
        Schema::dropIfExists('client_closings');
    }
}
