<?php

use App\Models\Brand;
use App\Models\Devtype;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('devices', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->softDeletes();
      $table->string('name');
      $table->boolean('status')->default(true);
      $table->foreignIdFor(Brand::class)
        ->nullable()
        ->constrained()
        ->cascadeOnUpdate()
        ->nullOnDelete();
      $table->foreignIdFor(Devtype::class)
        ->nullable()
        ->constrained()
        ->cascadeOnUpdate()
        ->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    if (app()->isLocal()) {
      Schema::dropIfExists('devices');
    }
  }
};
