<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiamCropsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciam_crops_type', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('crops');
            $table -> string('slug');
            $table -> string('icon');
            $table -> boolean('active') ->default(true);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ciam_crops_type');
    }
}
