<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Unit;
use App\Models\Worker;
use App\Models\Repdevice;

class Repair extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function unit(): BelongsTo
    {
      return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
  
    public function worker(): BelongsTo
    {
      return $this->belongsTo(Worker::class, 'worker_id', 'id');
    }
  
    public function repdevices(): HasMany
    {
      return $this->hasMany(Repdevice::class);
    }
}
