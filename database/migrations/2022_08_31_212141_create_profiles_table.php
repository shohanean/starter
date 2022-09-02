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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('phone_number')->nullable();
            $table->boolean('phone_number_verified')->default(true);
            $table->string('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->text('address')->nullable();
            $table->text('fb_link')->nullable()->comment('Facebook Profile Link');
            $table->text('ig_link')->nullable()->comment('Instagram Profile Link');
            $table->text('li_link')->nullable()->comment('Linkedin Profile Link');
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
        Schema::dropIfExists('profiles');
    }
};
