<?php

namespace App\Models;

// для відправки повідомлення на пошту
use Illuminate\Contracts\Auth\MustVerifyEmail;

//
use Illuminate\Contracts\Auth\CanResetPassword;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;


class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
  use HasFactory;   
  use Notifiable;
  use \Illuminate\Auth\Passwords\CanResetPassword;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'login',
    'email',
    'password',
    'is_active',
    'role'
  ];

    // захищені поля. якщо $guarded порожній, то все що не $guarded - розглядаються як філевл
  // protected $guarded = [];

  public function scopeEmailVerified(Builder $builder): void
  {
    $builder->whereNotNull('email_verified_at');
  }

  public function scopeActiveUser(Builder $builder): void
  {
    $builder->where('is_active', true);
  }

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }
}
