<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;
use App\Models\State;
use App\Models\Unit;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name_full', 255)->nullable();
            // $table->string('name', 64)->unique()->nullable();
            $table->string('name', 64)->nullable();
            $table->tinyInteger('gender')->unsigned()->default(0);
            $table->string('phone', 64)->nullable();
            $table->string('cellphone', 64)->nullable();
            $table->string('email', 64)->nullable();
            // $table->foreignIdFor(Post::class)->constrained();
            $table->foreignIdFor(State::class)->constrained();
            $table->decimal('rate', 8, 2)->default(1);
            $table->foreignIdFor(Unit::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            // $table->date('work_at')->nullable();
            // $table->date('order_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
