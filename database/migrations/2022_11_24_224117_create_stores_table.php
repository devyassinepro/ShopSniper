<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class CreateStoresTable extends Migration
{
    use DatabaseMigrations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb_second')->create('stores', function (Blueprint $collection) {
            $collection->index('_id');
            $collection->string('name');
            $collection->string('url');
            $collection->string('status');
            $collection->float('revenue');
            $collection->string('city');
            $collection->string('country');
            $collection->string('currency');
            $collection->string('shopifydomain');
            $collection->integer('sales');
            $collection->integer('allproducts');
            $collection->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
