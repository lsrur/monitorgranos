<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('data', function (Blueprint $table) {
      $table->id();
      $table->datetime('date');
      $table->decimal('temp_0', 10, 3)->nullable();
      $table->decimal('hum_0', 10, 3)->nullable();
      $table->decimal('co2_0', 10, 3)->nullable();
      $table->decimal('temp_1', 10, 3)->nullable();
      $table->decimal('hum_1', 10, 3)->nullable();
      $table->decimal('co2_1', 10, 3)->nullable();
      $table->decimal('temp_2', 10, 3)->nullable();
      $table->decimal('hum_2', 10, 3)->nullable();
      $table->decimal('co2_2', 10, 3)->nullable();
      $table->decimal('temp_3', 10, 3)->nullable();
      $table->decimal('hum_3', 10, 3)->nullable();
      $table->decimal('co2_3', 10, 3)->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('data');
  }
}
