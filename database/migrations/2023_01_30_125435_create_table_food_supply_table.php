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
        Schema::create('table_food_supply', function (Blueprint $table) {
            $table->id();
           // $table->string("supply_id");
            $table->string("name");
            $table->integer("quantity");
            $table->date("date");
            $table->decimal("amount");
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
        Schema::dropIfExists('table_food_supply');
    }
};
