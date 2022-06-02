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
            $table->foreignId("category_id")->constrained();
            $table->foreignId("publisher_id")->constrained();
            $table->string("author_1", 50);
            $table->string("author_2", 50)->nullable();
            $table->string("etla")->nullable();
            $table->string("place_of_pub", 50);
            $table->integer("year");
            $table->integer("isbn");
            $table->integer("class_no")->nullable();
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
