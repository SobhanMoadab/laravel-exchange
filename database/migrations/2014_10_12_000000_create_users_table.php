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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->integer('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('country_id')->nullable();
            $table->enum('is_verified', ['yes','no', 'in_progress'])->default('no');
            $table->integer('wallet_credits')->default(0);
            $table->json('commission_data')->nullable();
            $table->text('passport_pic')->nullable();
            $table->boolean('account_status')->default(1);
            $table->integer('type_id')->default(0);
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
