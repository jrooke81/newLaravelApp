<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function basket_items()
    {
        return $this->belongsToMany('App\Book', 'basket_items')
            ->as('basket_items')
            ->withPivot(['quantity', 'id'])
            ->withTimestamps();
    }

    public function basket_total()
    {
        $total = 0;
        foreach ($this->basket_items as $basket_item) {
            $total += $basket_item->price * $basket_item->basket_items->quantity;
        }
        return number_format($total,  2);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
