<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookBorrowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_borrow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('borrow_id');
            $table->unsignedBigInteger('book_id');

            // set foreignkey
            $table->foreign('borrow_id')->references('id')->on('borrows');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_borrow');
    }
}
