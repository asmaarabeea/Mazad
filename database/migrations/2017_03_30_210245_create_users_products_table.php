<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("products", function(Blueprint $table){
            $table->increments('pid');
            $table->string('productName',60);
            $table->text('product_desc');
            $table->text('product_img'); //img type in database blob
            $table->integer('price');
            $table->boolean('online')->default(true);
            $table->integer('highest_bid');
            $table->integer('no_of_bid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:table('products', function(Blueprint $table){
            $table->dropColumn('product_img');
        });
    }
}
