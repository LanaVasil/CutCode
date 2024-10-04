<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devtypes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 32)->unique()->nullable();
            $table->boolean('status')->default(true);
            $table->tinyInteger('sort')->unsigned()->default(99);
        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('devtypes');
        }
    }
};
