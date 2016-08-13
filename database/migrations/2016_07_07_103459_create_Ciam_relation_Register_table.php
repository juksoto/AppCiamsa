<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiamRelationRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciam_relation_register', function (Blueprint $table) {
            $table -> increments('id');

            // id crops type
            $table -> integer('crops_type_id') -> unsigned();
            $table -> foreign('crops_type_id') -> references('id') -> on('ciam_crops_type') -> onDelete('cascade');

            // id crops stage
            $table -> integer('crops_stage_id') -> unsigned() -> nullable();
            $table -> foreign('crops_stage_id') -> references('id') -> on('ciam_crops_stage') -> onDelete('cascade');

            // id products
            $table -> integer('product_id') -> unsigned() -> nullable();
            $table -> foreign('product_id') -> references('id') -> on('ciam_products') -> onDelete('cascade');

            // id registers
            $table -> integer('register_id') -> unsigned();
            $table -> foreign('register_id') -> references('id') -> on('ciam_registers') -> onDelete('cascade');


            $table -> string('mezcla_medida') -> nullable();

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
        Schema::drop('ciam_relation_register');
    }
}
