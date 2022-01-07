<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalNetPositionCumulativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_net_position_cumulatives', function (Blueprint $table) {
            $table->id();
            $table->string('scrip_code')->nullable();
            $table->string('scrip_name')->nullable();
            $table->decimal('plus_qty',15,2)->nullable();
            $table->decimal('plus_avg',15,2)->nullable();
            $table->decimal('purchase_value',15,2)->nullable();
            $table->decimal('minus_qty',15,2)->nullable();
            $table->decimal('minus_avg',15,2)->nullable();
            $table->decimal('sales_value',15,2)->nullable();
            $table->decimal('net_qty',15,2)->nullable();
            $table->decimal('net_avg',15,2)->default(0)->nullable();
            $table->decimal('net_value',15,2)->default(0)->nullable();
            $table->decimal('market',15,2)->nullable();
            $table->decimal('market_value',15,2)->nullable();
            $table->decimal('today_pl',15,2)->nullable();
            $table->decimal('p_l',15,2)->nullable();


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
        Schema::dropIfExists('global_net_position_cumulatives');
    }
}
