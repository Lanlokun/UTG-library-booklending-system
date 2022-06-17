<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_students', function (Blueprint $table) {
            $table->id();
            $table->index('book_copy_id');
            $table->foreign('book_copy_id')->references('id')->on('book_copies')->onDelete('cascade');
            $table->index('library_id');
            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
            $table->index('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->datetime("date_borrowed");
            $table->datetime("date_expected");
            $table->datetime("date_returned");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_students');
    }
};
