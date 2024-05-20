<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn', 13)->unique();
            $table->string('title', 250);
            $table->string('author', 150);
            $table->string('image_path', 100)->nullable();
            $table->string('publisher', 50);
            $table->unsignedBigInteger('id_category');
            $table->bigInteger('pages')->unsigned();
            $table->string('language', 20);
            $table->timestamp('publish_date')->nullable();
            $table->string('subjects', 50)->nullable();
            $table->text('desc')->nullable();
            $table->timestamps();

            //foreign
            $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
