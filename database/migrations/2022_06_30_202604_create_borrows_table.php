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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId("book_copy_id")->constrained();
            $table->foreignId("library_id")->constrained();
            $table->foreignId("student_id")->nullable()->constrained();
            $table->foreignId("staff_id")->nullable()->constrained();
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
        Schema::dropIfExists('borrows');
    }
};
