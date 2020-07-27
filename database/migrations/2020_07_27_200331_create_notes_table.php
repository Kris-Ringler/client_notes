<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('noteContent');
            $table->timestamps();
        });

        Schema::create('authorId', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->timestamps();
            $table->unique(['userId']);
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('clientId', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
            $table->unique('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
