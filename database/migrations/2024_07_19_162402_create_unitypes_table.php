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
    Schema::create('unitypes', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->softDeletes();
      $table->string('name', 32)->unique()->nullable();
      $table->boolean('status')->default(true);
      $table->tinyInteger('sort')->unsigned()->default(99);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (app()->isLocal()) {
      Schema::dropIfExists('unitypes');
    }
  }
};
