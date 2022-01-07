<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_statements', function (Blueprint $table) {
                $table->id();
                $table->date('entry_date');
                $table->string('voucher_no')->nullable();
                $table->string('bank')->nullable();
                $table->string('cheque')->nullable();
                $table->string('exchange')->nullable();
                $table->string('book_type')->nullable();
                $table->integer('settlement_no')->default(0)->nullable();
                $table->date('transaction_date')->nullable();
                $table->text('description_narration')->nullable();;
                $table->decimal('dr_amount',15,2)->default(0)->nullable();
                $table->decimal('cr_amount',15,2)->default(0)->nullable();
                $table->decimal('final_dr_cr',15,2)->default(0)->nullable();
                $table->string('fyear');

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
        Schema::dropIfExists('financial_statements');
    }
}
