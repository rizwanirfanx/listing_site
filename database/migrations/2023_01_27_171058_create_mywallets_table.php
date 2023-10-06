<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMywalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mywallets', function (Blueprint $table) {
            
            $table->bigIncrements('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('type', 200);
			$table->string('price', 200)->nullable();
			$table->string('remaining', 255)->nullable();
			$table->string('phone', 200)->nullable();
			$table->string('status', 100)->nullable();
			$table->string('desc', 500)->nullable();
			$table->timestamps();
			$table->index(["user_id"]);
			$table->index(["type"]);
			$table->index(["price"]);
			$table->index(["remaining"]);
			$table->index(["status"]);
			$table->index(["desc"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mywallets');
    }
}
