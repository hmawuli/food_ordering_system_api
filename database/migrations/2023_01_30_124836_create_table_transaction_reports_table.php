<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_transaction_reports', function (Blueprint $table) {
            $table->id();
            $table->string("order_id");
            $table->string("customer_id");
           // $table->string("order_id");
            $table->string("food_id");
            $table->string("supply_id");
            $table->string("delivery_id");
            $table->date("date");
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
        Schema::dropIfExists('table_transaction_reports');
    }
};
