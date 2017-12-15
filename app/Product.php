<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'precio', 'imagen', 'category_id', 'brand_id'];

    public function category()
    {
      return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function brand()
    {
      return $this->BelongsTo('App\Brand', 'brand_id', 'id');
    }

    public function tags()
    {
      return $this->belongsToMany('\App\Tag', 'products_tags', 'product_id', 'tag_id');

    }

    public function users()
    {
      return $this->belongsToMany('\App\User', 'carts', 'product_id', 'user_id');
    }

}
