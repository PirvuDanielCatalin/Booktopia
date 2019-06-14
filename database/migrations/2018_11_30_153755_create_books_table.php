<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('title',101);
            $table->string('author',101);
            $table->string('publishing_house',101);
            $table->text('description');
            $table->string('photo',101)->nullable();
            $table->float('price');
            $table->string('ISBN',14)->nullable();
            $table->tinyInteger('inShop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('books');
    }
}
