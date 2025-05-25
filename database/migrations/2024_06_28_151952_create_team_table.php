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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100);
           $table->string('designation', 100);
           $table->string('telephone', 100);
           $table->string('mobile', 100);
           $table->string('email', 100)->unique();
           $table->string('facebook_id')->unique();
           $table->string('twitter_id')->unique();
           $table->string('pinterest_id')->unique();
           $table->text('profile')->nullable();
           $table->string('team_img', 100);
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
        Schema::dropIfExists('team');
    }
};
