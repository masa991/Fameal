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
    Schema::create('ingredients', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('recipe_id');
      $table->string('name');
      $table->string('quantity');
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
    Schema::dropIfExists('ingredients');
  }
};
