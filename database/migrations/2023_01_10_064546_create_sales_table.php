<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class CreateSalesTable extends Migration
{
    use DatabaseMigrations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb_second')->create('sales', function (Blueprint $collection) {
            $collection->id();
            $collection->timestamps();
            $collection->foreignId('product_id')->constrained()->onDelete('cascade');
            $collection->foreignId('stores_id')->constrained()->onDelete('cascade');
            $collection->float('prix');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
