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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string("slug", 100)->nullable()->unique();
            $table->longText('content');
            $table->string('status');
            $table->integer('view');
            $table->integer('download');
            $table->decimal('rating');
            $table->unsignedBigInteger('categorytopic_id');
            $table->foreign('categorytopic_id')->references('id')->on('category_topics')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('topics');
    }
};
