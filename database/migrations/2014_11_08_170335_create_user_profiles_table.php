<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unique();
            $table->date('birthday')->nullable();
            $table->string('country_code')->nullable();
            $table->unsignedSmallInteger('gender')->nullable()->default(0);//性别。MALE：男，FEMALE：女。
            $table->unsignedInteger('province_id')->nullable()->comment('省');
            $table->unsignedInteger('city_id')->nullable()->comment('市');
            $table->unsignedInteger('district_id')->nullable()->comment('区');
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('introduction')->nullable();
            $table->text('bio')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
