<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_blocks', function (Blueprint $table) {

            $table->increments('id');

            $table->string('page_key');
            $table->string('block_key');

            $table->enum('type',['text','link'])->default('text');

            $table->string('page_name');
            $table->string('block_name');

            $table->text('text')->nullable();
            $table->text('link')->nullable();

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
        Schema::dropIfExists('text_blocks');
    }
}
