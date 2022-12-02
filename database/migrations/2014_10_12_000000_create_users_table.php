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
            $table->id();
            $table->string('login', 60)->unique();
            $table->string('name', 60);
            $table->string('surname', 60);
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password', 60);
            $table->enum('role', ['user', 'admin', 'librarian'])->default('user');
            $table->boolean('activated')->default(false);
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
