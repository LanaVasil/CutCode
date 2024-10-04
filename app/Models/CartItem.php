<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Cart;
use App\Models\Device;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable=[
      'cart_id',
      'device_id',
      'note',
      'quantity',
      'string_option_values'
    ];

    protected $casts=[
      'note'=>''
    ];

    public function cart(): BelongsTo
    {
      return $this->belongsTo(Cart::class);
    }

    public function device(): BelongsTo
    {
      return $this->belongsTo(Device::class, 'device_id', 'id');
    }

    public function optionValue(): HasMany
    {
      return $this->hasMany(CartItem::class);
    }
} 
