<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Structure extends Model
{
  use HasFactory;
  use SoftDeletes;

  // protected $fillable = ['name', 'content'] -  перелік полів які можно заповнювати методoм only
  // protected $fillable = ['name', 'status', 'brand_id', 'devtype_id'];

  // захищені поля. якщо $guarded порожній, то все що не $guarded - розглядаються як філевл
  protected $guarded = []; 


  public function scopeHomePage(Builder $query)
  {
     // return $query->where('status', 1)->orderBy('sort');
    return $query->where('status', 1);
  }

  public function scopeSearch(Builder $query, $value)
  {
    // $query->where('name', 'like', "%{$value}%")->orWhere('email', 'like', "%{$value}%");
    $query->where('name', 'like', "%{$value}%");
  }

  public function scopeFilterField(Builder $query, $value, $field)
  {
    if ($value > 0)
      $query->where("{$field}", "{$value}");
  }

  public function unit(): BelongsTo
  {
    return $this->belongsTo(Unit::class, 'unit_id', 'id');
  }


  // public function post(): BelongsTo
  // {
  //   return $this->belongsTo(Post::class, 'post_id', 'id');
  // }
}
