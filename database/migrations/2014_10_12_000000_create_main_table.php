<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('phone_number');
            $table->string('email',72)->unique();
            $table->string('password',50);
            $table->unsignedInteger('role_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email',72)->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('colony');
            $table->string('postal_code');
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('text');
            $table->string('img_src');
            $table->string('fecha');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
