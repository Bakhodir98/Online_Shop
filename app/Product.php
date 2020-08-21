<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'code', 'name', 'description', 'details', 'price', 'old_price', 'image', 'new', 'sale', 'popular'];
    // public function getCategory()
    // {
    //    return Category::find($this->category_id);
    // }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getPriceForCount()
    {
        if (!is_Null($this->pivot)) {
            $price = (int) $this->price;
            return $this->pivot->count * $price;
        }
        return $this->price;
    }
    public function getCount()
    {
        if (!is_Null($this->pivot)) {
            return $this->pivot->count;
        }
        return 0;
    }

    public function isNew()
    {
        $this->new === 1;
    }
    public function isSale()
    {
        $this->sale === 1;
    }
    public function isPopular()
    {
        $this->popular === 1;
    }
}