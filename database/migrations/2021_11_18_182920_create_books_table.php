<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->dateTime('publication_date');
            $table->decimal('quantity');
            $table->decimal('price');
            $table->text('description');
            $table->string('book_cover');
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('bookCategories')->onDelete('cascade');
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
