<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\Models\HasSlug;

class Brand extends Model
{
  use HasFactory;
  use HasSlug;
  use SoftDeletes;

  // protected $fillable = ['name', 'content'] -  перелік полів які можно заповнювати методoм only
  protected $fillable = ['name', 'status', 'sort'];

  // захищені поля. якщо $guarded порожній, то все що не $guarded - розглядаються як філевл
  // protected $guarded = [];

  // protected static function boot()
  // {
  //   parent::boot();

  //   //TODO 3rd lesson
  //   static::creating(function (Brand $brand) {
  //     $brand->slug = $brand->slug ?? str($brand->name)->slug();
  //   });
  // }



  public function scopeHomePage(Builder $query)
  {
    // return $query->where('status', 1)->orderBy('sort')->limit(10);
    return $query->where('status', 1)->orderBy('sort');
  }

  public function scopeSearch(Builder $query, $value)
  {
    // $query->where('name', 'like', "%{$value}%")->orWhere('email', 'like', "%{$value}%");
    $query->where('name', 'like', "%{$value}%");
  }

  // public function devices(): HasMany
  // {
  //   return $this->hasMany(Device::class);
  // }
}
