<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('uid')->index();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('subscription')->index()->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('active')->default(0);
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
            $table->primary(['uid']);
            $table->foreign('subscription')->references('id')->on('subscriptions')->onDelete('cascade');
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
