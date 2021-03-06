<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiamRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciam_registers', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('name');
            $table -> string('email');

            // id Departments
            $table -> integer('department_id') -> unsigned();
            $table -> foreign('department_id') -> references('id') -> on('ciam_departments') -> onDelete('cascade');

            $table -> string('town');
            $table -> string('phone') -> nullable();
            $table -> string('mobile') -> nullable();
            $table -> string('company') -> nullable();
            $table -> string('information') -> nullable();

            $table -> boolean('active') ->default(true);
            $table -> timestamps();

            $table -> index('email');
            $table -> index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ciam_registers');
    }
}
