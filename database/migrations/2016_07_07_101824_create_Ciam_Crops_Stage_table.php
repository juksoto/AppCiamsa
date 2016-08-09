<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiamCropsStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciam_crops_stage', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('stage');
            $table -> string('subline');
            $table -> string('image');

            // id Categories
            $table -> integer('type_id') -> unsigned();
            $table -> foreign('type_id') -> references('id') -> on('ciam_crops_type') -> onDelete('cascade');


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
        Schema::drop('ciam_crops_stage');
    }
}
