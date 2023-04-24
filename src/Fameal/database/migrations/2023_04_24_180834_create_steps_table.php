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
    Schema::create('steps', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('recipe_id');
      $table->text('direction');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->foreign('recipe_id')
        ->references('id')
        ->on('recipes');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('steps');
  }
};