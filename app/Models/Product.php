<?php

namespace App\Models;

use App\Http\Livewire\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    #One To Many (Inverse) / Belong To

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function shopcart(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Shopcart::class);
    }
    public function orderitem(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Orderitem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
