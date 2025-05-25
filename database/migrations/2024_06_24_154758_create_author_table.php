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
        Schema::create('author', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->string('designation', 100);
            $table->string('dob', 100);
            $table->string('country', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 100);
            $table->text('description')->nullable();
            $table->string('author_feature', 5);
            $table->string('facebook_id', 100)->unique();
            $table->string('twitter_id', 100)->unique();
            $table->string('youtube_id', 100)->unique();
            $table->string('pinterest_id', 100)->unique();
            $table->string('author_img', 100);
            $table->string('status', 10);
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
        Schema::dropIfExists('author');
    }
};
