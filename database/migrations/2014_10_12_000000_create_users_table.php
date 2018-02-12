<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('api_token', 60)->unique();
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->string('avatar');
            $table->string('phone')->nullable();
            $table->text('about')->nullable();
            $table->text('citate')->nullable();
            $table->string('status')->nullable();
            $table->string('web-site')->nullable();
            $table->string('icq')->nullable();
            $table->string('skype')->nullable();
            $table->string('pay_card_pb')->nullable();
            $table->string('pay_card_2')->nullable();
            $table->string('webmoney_id')->nullable();
            $table->string('wmz')->nullable();
            $table->string('ee')->nullable();
            $table->string('okpay')->nullable();
            $table->text('resume')->nullable();
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
        Schema::dropIfExists('users');
    }
}
