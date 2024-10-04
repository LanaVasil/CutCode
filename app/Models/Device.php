<?php
// process
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Brand; 
use App\Models\Devtype; 

class Device extends Model
{
  use HasFactory;
  use SoftDeletes;

  // protected $fillable = ['name', 'content'] -  перелік полів які можно заповнювати методoм only
  protected $fillable = ['name', 'status', 'brand_id', 'devtype_id'];

  // захищені поля. якщо $guarded порожній, то все що не $guarded - розглядаються як філевл
  // protected $guarded = []; нижче можно ще так
  // protected $guarded = false;

  public function scopeHomePage(Builder $query)
  {
    // return $query->where('status', 1)->orderBy('sort')->limit(10);
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


  public function brand(): BelongsTo
  {
    return $this->belongsTo(Brand::class, 'brand_id', 'id');
  }

  public function devtype(): BelongsTo
  {
    return $this->belongsTo(Devtype::class, 'devtype_id', 'id');
  }


  // зразок як люди роблять
  // public function category()
  // {
  //     return $this->belongsTo(Category::class, 'category_id', 'id');
  // }
  // public function tags()
  // {
  //     return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
  // }

}
