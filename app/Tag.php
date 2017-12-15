<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function product()
  {
    return $this->belongsToMany('\App\Product', 'products_tags', 'tag_id', 'product_id');

  }
}
