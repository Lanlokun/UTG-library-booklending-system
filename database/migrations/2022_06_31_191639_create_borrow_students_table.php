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
            $table->foreignId('book_copy_id')->constrained()->onDelete('cascade');
            $table->foreignId('library_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->datetime("date_borrowed");
            $table->datetime("date_expected");
            $table->datetime("date_returned")->nullable();
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
