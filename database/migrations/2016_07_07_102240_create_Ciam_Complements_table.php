<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiamComplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciam_complements', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string("complement");
            $table -> string("components");
            $table -> string("image");

            // id Categories
            $table -> integer('category_id') -> unsigned();
            $table -> foreign('category_id') -> references('id') -> on('ciam_categories') -> onDelete('cascade');

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
        Schema::drop('ciam_complements');
    }
}
