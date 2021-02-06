<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('user_id')->constrained('users');
            $table->string('title')->index();
            $table->string('slug')->unique()->index();
            $table->string('kicker')->nullable();
            $table->longText('body')->nullable();
            $table->boolean('top')->default(false);
            $table->string('status');
            $table->bigInteger('viewers')->default(0);
            $table->foreignId('publisher_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
