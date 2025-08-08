<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneNumberToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the phone_number column
            $table->string('phone_number')->nullable()->after('email'); // Example: string type, nullable, after email column
            // You can adjust the type (e.g., integer if you only store numbers), length, and position as needed.
            // ->nullable() means it's optional, ->unique() if you want unique phone numbers, etc.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the phone_number column if rolling back
            $table->dropColumn('phone_number');
        });
    }
}