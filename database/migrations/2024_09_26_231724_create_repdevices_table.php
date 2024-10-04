<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Device;
use App\Models\Document;
use App\Models\Repair;
use App\Models\Worker;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repdevices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(Repair::class)->nullable()->constrained();
            $table->foreignIdFor(Device::class)->nullable()->constrained();
            $table->foreignIdFor(Worker::class)->nullable()->constrained();
            $table->foreignIdFor(Document::class)->nullable()->constrained();
            $table->string('note', 255)->nullable();
            $table->string('serial', 32)->nullable();
            $table->string('inventory', 32)->nullable();
            $table->date('transfer_at')->nullable();
            $table->date('make_at')->nullable();
            $table->date('return_at')->nullable();
            $table->integer('parent_id')->unsigned()->default(0);
            $table->tinyInteger('box')->unsigned()->default(1);
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal()) {
          Schema::dropIfExists('repdevices');
        }
    }
};
