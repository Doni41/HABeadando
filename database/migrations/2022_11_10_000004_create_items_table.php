<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Schema::disableForeignKeyConstraints();

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('obtained');
            $table->string('image')->nullable();
            $table->timestamps();
            
            // Relaciok - felesleges
            // $table->unsignedBigInteger('comment_id')->nullable();
            // $table->unsignedBigInteger('label_id')->nullable();
            // $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            // $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
