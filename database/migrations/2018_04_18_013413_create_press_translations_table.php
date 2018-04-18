<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('press_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description')->nullable();

            $table->unique(['press_id', 'locale']);
            $table->foreign('press_id')->references('id')->on('presses')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('press_translations');
    }
}
