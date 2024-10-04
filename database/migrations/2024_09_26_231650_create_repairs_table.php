<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Unit;
use App\Models\Worker;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(Unit::class)->nullable()->constrained();
            $table->foreignIdFor(Worker::class)->nullable()->constrained();
            $table->string('note', 255)->nullable();
            $table->string('content', 255)->nullable();
            $table->tinyInteger('doc_p')->unsigned()->default(0);
            $table->tinyInteger('transfer_p')->unsigned()->default(0);
            $table->tinyInteger('make_p')->unsigned()->default(0);
            $table->tinyInteger('return_p')->unsigned()->default(0);
            $table->tinyInteger('status')->unsigned()->default(0);
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal()) {
          Schema::dropIfExists('repairs');
        }
    }
};
