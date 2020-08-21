<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Image;
use App\Order;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // dd(get_class_methods($this->route()));
        $products = Product::get();
        $orderId = session('orderId');
        // dd($orderId);
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('index', compact('products', 'order'));
        }
        return view('index', compact('products'));
    }
    public function categories()
    {
        $categories = Category::get();
        $orderId = session('orderId');
        // dd($orderId);
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('categories', compact('categories', 'order'));
        }
        return view('categories', compact('categories'));
    }
    public function product($category = null, $product_code = null)
    {
        $orderId = session('orderId');
        // dd($orderId);
        $product = Product::where('code', $product_code)->first();
        $images = Image::get();
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('product', compact('product', 'images', 'category', 'order'));
        }
        return view('product', compact('product', 'images', 'category'));
    }
    public function category($code = null)
    {
        // dd($category);
        $category = Category::where('code', $code)->first();
        // $products = Product::where('category_id', $categoryObject->id)->get();
        // dd($products->image);
        // dd($category);
        $orderId = session('orderId');
        // dd($orderId);
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('category', compact('category', 'order'));
        }
        return view('category', compact('category'));
    }
    public function card()
    {
        $orderId = session('orderId');
        // dd($orderId);
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('card', compact('order'));
        }
        return view('card');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function allProducts()
    {
        // dd(get_class_methods($this->route()));
        $products = Product::get();
        $orderId = session('orderId');
        // dd($orderId);
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('allproducts', compact('products', 'order'));
        }
        return view('allproducts', compact('products'));
    }
}