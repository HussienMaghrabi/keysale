<?php

use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserPaidTyps;
use App\ModulesConst\UserTyps;
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
            $table->bigIncrements('id');
            $table->string('user_type_id')->default(UserTyps::user);
            $table->string('fire_base_token')->nullable();
            $table->string('api_token')->nullable();
            $table->string('mobile_code')->nullable();
            $table->string('name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('activeCode')->nullable();
            $table->string('passCode')->nullable();
            $table->string('userVerify')->default(\App\ModulesConst\UserVerify::no);
            $table->string('social_id')->nullable();
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
