<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->increments('id');

            $table->string('subject')->nullable();
            $table->text('description');

            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();

            $table->boolean('is_new')->default(false);
            $table->boolean('is_moderated')->default(false);
            $table->boolean('is_valid')->default(false);
            $table->boolean('has_approved_sworn_statement')->default(false);
            $table->boolean('has_approved_term_of_use')->default(false);

            $table->integer('theme_id')->unsigned()->nullable();
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');

            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');

            $table->integer('municipality_id')->unsigned()->nullable();
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::table('complains', function (Blueprint $table) {
            $table->integer('complain_id')->unsigned()->nullable();
            $table->foreign('complain_id')->references('id')->on('complains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complains');
    }
}
