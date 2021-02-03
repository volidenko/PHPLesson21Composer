<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tables', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('topics', function (Blueprint $table) {
            $table->increments("id");
            $table->string("topicname", 100)->unique();
            $table->timestamps(); //create_at, update_at
        });
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("topicid")->unsigned();
            $table->foreign("topicid")->references("id")-> on("topics")->onDelete("cascade");
            $table->string("title", 100)->unique();
            $table->longText("content")->nullable();
            $table->string("imagePath", 255)->nullable();
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
        Schema::dropIfExists('topics');
        Schema::dropIfExists('blocks');
    }
}
