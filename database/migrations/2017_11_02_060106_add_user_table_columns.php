<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('pincode', 10)->nullable();
            $table->string('phone', 10)->nullable();
            $table->text('residential_address')->nullable();
            $table->boolean('gender')->nullable();
            $table->date('dob')->default('1990-01-01');
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
            //
            $table->dropColumn('pincode');
            $table->dropColumn('phone');
            $table->dropColumn('residential_address');
            $table->dropColumn('gender');
            $table->dropColumn('dob');
        });
    }
}
