<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndxingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indxings', function (Blueprint $table) {
             $table->bigIncrements('id');
			
			$table->string('status', 100)->nullable();
			$table->string('url', 300)->nullable();
			$table->timestamps();
			
			$table->index(["status"]);
			$table->index(["url"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indxings');
    }
}
