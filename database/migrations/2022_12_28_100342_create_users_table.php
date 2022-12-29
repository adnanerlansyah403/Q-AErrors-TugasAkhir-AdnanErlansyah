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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->default(1);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->date('birthdate')->nullable();
            $table->enum("gender", ['l', 'p'])->default('p');
            $table->string('photo_originalname')->nullable(); // e.g: 'photo.png'
            $table->string('photo_path')->nullable(); // e.g: '/storage/photo_profile_user/photo.png'
            $table->string('photo_link')->nullable(); // eg 'http://localhost/storage/photo_profile_user/photo.png'
            $table->string('profession')->nullable();
            $table->string('address')->nullable();
            $table->rememberToken();

            $table->foreign('role_id')->references('id')->on('roles');

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
};
