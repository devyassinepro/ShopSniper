<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class CreateNichestoresTable extends Migration
{
    use DatabaseMigrations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb_second')->create('niche_stores', function (Blueprint $collection) {
            $collection->index('_id');
            $collection->foreignId('stores_id')->constrained()->onDelete('cascade');
            $collection->foreignId('niche_id')->constrained()->onDelete('cascade');
            $collection->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niche_stores');
    }
}
