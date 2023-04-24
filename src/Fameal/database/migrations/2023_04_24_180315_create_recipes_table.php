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
    Schema::create('recipes', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('family_id');
      $table->string('title');
      $table->text('description');
      $table->string('serving');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->foreign('family_id')
        ->references('id')
        ->on('families');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('recipes');
  }
};
