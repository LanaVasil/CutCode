<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Repair;
use App\Models\Device;
use App\Models\Worker;
use App\Models\Document;

class Repdevice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function repair(): BelongsTo
    {
        return $this->belongsTo(Repair::class, 'repair_id', 'id');
    }

    public function worker(): BelongsTo
    {
    return $this->belongsTo(Worker::class, 'worker_id', 'id');
    }

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class, 'device_id', 'id');
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }
}
