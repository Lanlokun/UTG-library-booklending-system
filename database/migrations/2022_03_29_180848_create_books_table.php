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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title", 50);
            $table->string("edition", 50);
            $table->foreignId("category_id");
            $table->string("publisher_id");
            $table->string("author_1", 50);
            $table->string("author_2", 50)->nullable();
            $table->string("etla")->nullable();
            $table->string("Place of Pub", 50);
            $table->integer("year");
            $table->integer("ISBN")->unique();
            $table->integer("Class No")->nullable();
            $table->string("more_details", 255)->nullable();
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
        Schema::dropIfExists('books');
    }
};
