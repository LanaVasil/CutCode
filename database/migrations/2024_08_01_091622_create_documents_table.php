<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Unit;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->date('income_at')->nullable();
            $table->string('income', 32)->nullable();
            $table->string('name_full', 255)->nullable();
            $table->string('name', 64)->nullable();
            $table->foreignIdFor(Unit::class)->constrained();
            $table->date('unitdoc_at')->nullable();
            $table->string('unitdoc', 32)->unique()->nullable();
            $table->date('ddzdoc_at')->nullable();
            $table->string('ddzdoc', 32)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
