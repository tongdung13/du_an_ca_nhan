<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrows', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('book_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrows', function (Blueprint $table) {
            //
        });
    }
}
