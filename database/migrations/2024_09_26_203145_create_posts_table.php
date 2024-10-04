<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name_full', 255)->nullable();
            $table->string('name', 32)->nullable();
            $table->decimal('stake',3,2)->default(1);
            $table->tinyInteger('sort')->unsigned()->default(99);
            $table->boolean('status')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('posts');
        } 
    }
};
