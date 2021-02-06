<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('slug')->unique()->index();
            $table->string('name');
            $table->string('caption')->nullable();
            $table->text('description')->nullable();
            $table->string('disk')->default('public');
            $table->string('mime_type')->nullable();
            $table->string('path');
            $table->unsignedBigInteger('size');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('media');
    }
}