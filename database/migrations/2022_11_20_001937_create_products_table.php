<?php

use App\Models\Sales;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class CreateProductsTable extends Migration
{
    use DatabaseMigrations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb_second')->create('products', function (Blueprint $collection) {
            $collection->id();
            $collection->string('title',500);
            $collection->string('timesparam',500);
            $collection->float('prix');
            $collection->float('revenue');
            // $collection->foreignId('stores_id');
            $collection->foreignId('store_id')->constrained()->cascadeOnDelete();
            $collection->string('url',500);
            $collection->string('imageproduct',500);
            $collection->integer('totalsales');
            $collection->integer('favoris');
            $collection->integer('todaysales');
            $collection->integer('yesterdaysales');
            $collection->integer('day3sales');
            $collection->integer('day4sales');
            $collection->integer('day5sales');
            $collection->integer('day6sales');
            $collection->integer('day7sales');
            $collection->integer('weeksales');
            $collection->integer('monthsales');
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
