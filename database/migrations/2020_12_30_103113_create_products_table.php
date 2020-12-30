<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',150);
            $table->string('keywords')->nullable();;
            $table->string('description')->nullable();;
            $table->string('image',100)->nullable();;
            $table->integer('category_id')->nullable();;
            $table->integer('user_id')->nullable();;
            $table->float('price')->nullable();;
            $table->integer('quantity')->nullable();;
            $table->integer('minQuantity')->nullable();;
            $table->integer('tax')->nullable();;
            $table->string('location')->nullable();;
            $table->text('detail')->nullable();;
            $table->string('slug',100)->nullable();;
            $table->string('status',5)->nullable()->default('False');
            $table->timestamps();//created at, updated at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
