<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiamTypeHasStageCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciam_type_has_stage_crops', function (Blueprint $table) {
            $table -> increments('id');

            // id crops type
            $table -> integer('crops_type_id') -> unsigned();
            $table -> foreign('crops_type_id') -> references('id') -> on('ciam_crops_type') -> onDelete('cascade');

            // id crops stage
            $table -> integer('crops_stage_id') -> unsigned();
            $table -> foreign('crops_stage_id') -> references('id') -> on('ciam_crops_stage') -> onDelete('cascade');

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
        Schema::drop('ciam_type_has_stage_crops');
    }
}
