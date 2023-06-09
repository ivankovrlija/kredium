<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                [
                    'first_name' => 'Ivan',
                    'last_name' => 'Kovrlija',
                    'email'      => 'ivan@gmail.com',
                    'email_verified_at' => now(),
                    'password'   => bcrypt('Ivan123!'),
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'first_name' => 'Petar',
                    'last_name' => 'Petrovic',
                    'email'      => 'petar@gmail.com',
                    'email_verified_at' => now(),
                    'password'   => bcrypt('Petar123!'),
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
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
