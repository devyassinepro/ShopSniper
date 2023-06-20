<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class CreateNichesTable extends Migration
{
    use DatabaseMigrations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::connection('mongodb_second')->create('niches', function (Blueprint $table) {
        //     // $table->increments('id');
        //     $table->string('name');
        //     $table->integer('user_id');
        //     $table->timestamps();
        // });
        Schema::connection('mongodb_second')->create('niches', function (Blueprint $collection) {
            // $collection->id();
            $collection->index('_id');
            $collection->string('name');
            $collection->integer('user_id');
            // Add more fields if needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('niches');
    // }
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('niches');
    }
}
