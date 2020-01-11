<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamesController', function (Blueprint $table) {
            $table->bigIncrements('id'); //Primary key
            $table->bigInteger('genre_id'); //Foreign key
            $table->bigInteger('developer_id'); // Foreign key
            $table->decimal('price');
            $table->string('name');
            $table->text('description');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('gamesController', function (Blueprint $table) {
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade');

            $table->foreign('developer_id')
                ->references('id')
                ->on('developers')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gamesController');
    }
}
