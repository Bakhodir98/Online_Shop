<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimeStamps();
    }
    
    public function getFullPrice()
    {
        $sum = 0;
        foreach($this->products as $product)
        {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
    public function getFullCount()
    {
        $count = 0;
        foreach($this->products as $product)
        {
            $count += $product->getCount();
        }
        return $count;
    }
    public function saveOrder($name, $phone)
    {
        if($this->status == 0) 
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');

            return true;
        }
        else
        {
            return false;
        }
    }
} 