<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('product');
            $table->string('typename');
            $table->integer('inches');
            $table->string('screenresolution');
            $table->string('cpu');
            $table->string('ram');
            $table->string('memory');
            $table->string('gpu');
            $table->string('opsis');
            $table->string('weight');
            $table->bigInteger('price');
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
        Schema::dropIfExists('laptops');
    }
}
