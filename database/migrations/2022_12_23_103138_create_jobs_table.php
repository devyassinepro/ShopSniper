<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class CreateJobsTable extends Migration
{
    use DatabaseMigrations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb_second')->create('jobs', function (Blueprint $collection) {
            $collection->index('id');
            $collection->string('queue')->index();
            $collection->longText('payload');
            $collection->unsignedTinyInteger('attempts');
            $collection->unsignedInteger('reserved_at')->nullable();
            $collection->unsignedInteger('available_at');
            $collection->unsignedInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
