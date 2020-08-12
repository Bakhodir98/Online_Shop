<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['code', 'name', 'desription'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}