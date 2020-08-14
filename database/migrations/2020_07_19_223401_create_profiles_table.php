<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
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
            $table->integer('user_id');
            $table->text('info')->nullable();
            $table->string('myfav')->nullable();
            $table->string('image')->nullable();
            $table->string('country')->nullable();
            $table->string('fullname')->nullable();
            $table->string('FB')->nullable();
            $table->string('TW')->nullable();
            $table->string('LN')->nullable();
            $table->string('BH')->nullable();
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
}
