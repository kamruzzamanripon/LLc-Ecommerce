<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];


    //Auto slug Category
    protected static function boot()
    {
        parent::boot();
        static ::creating(function ($category){
            $category->slug = str_slug($category->name);
        });
    }

    public function parent_category()
    {
        return $this->belongsTo(__CLASS__); //ex same as Category::class
    }

    public function child_category()
    {
        return $this->hasMany(__CLASS__);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
