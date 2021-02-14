<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
	        $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('title');
            $table->longText('content');
            $table->timestamps();
            $table->boolean('is_published')->nullable()->default(false);

            $table->foreign('user_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
