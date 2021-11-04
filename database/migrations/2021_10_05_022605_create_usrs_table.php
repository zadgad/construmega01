<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('usr', function (Blueprint $table) {
                $table->increments('id_usr');
                $table->string('login', 300)->unique();
                $table->string('email')->unique();
                $table->string('password');
                $table->string('foto');
                $table->integer('ci_per');
                $table->foreign('ci_per')->references('ci')->on('persona')->onDelete('cascade');
                $table->softDeletes();
                $table->rememberToken();
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
        Schema::dropIfExists('usrs');
    }
}
