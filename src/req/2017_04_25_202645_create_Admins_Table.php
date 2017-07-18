<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('Admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        /**
         * adding admin account to admins table
         * with email: admin@example.com
         * and password: 123456
         */
        DB::table('admins')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password'  => Hash::make('123456'),
            )
        );
        
    }

    public function down()
    {
        Schema::dropIfExists('Admins');
    }
}
