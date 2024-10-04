<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Device;
use App\Models\DeviceValue;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Cart::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete(); 

            $table->foreignIdFor(Device::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete(); 

            $table->string('note', 255)->nullable();

            $table->integer('quantity')->default(1);

            $table->string('string_option_values')->nullable();

            $table->timestamps();
        });

        Schema::create('cart_item_option_value', function (Blueprint $table) {
          $table->id();

          $table->foreignIdFor(CartItem::class)
          ->nullable()
          ->constrained()
          ->cascadeOnUpdate()
          ->cascadeOnDelete(); 

          $table->foreignIdFor(DeviceValue::class)
          ->nullable()
          ->constrained()
          ->cascadeOnUpdate()
          ->cascadeOnDelete(); 

          $table->string('note', 255)->nullable();

          $table->integer('quantity')->default(1);

          $table->string('string_option_values')->nullable();

          $table->timestamps();
      });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
