<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    //Auto slug Create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product){
            $product->slug = str_slug($product->title);
        });
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
