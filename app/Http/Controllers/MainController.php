<?php
namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Image;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('index', compact('products'));
    }
    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function product($category = null,$product_code = null)
    {
        $product = Product::where('code',$product_code)->first();
        $images = Image::get();
        return view('product', compact('product', 'images', 'category'));
    }
    public function category($category = null)
    {
        // dd($category);
        $categoryObject = Category::where('code', $category)->first();
        $products = Product::where('category_id', $categoryObject->id)->get();
        // dd($products->image);
        return view('category', compact('category','products'));
    }
    public function card() {
        return view('card');
    }
    public function basket() 
    {
        return view('basket');
    }
    public function orderPlace() 
    {
        return view('order');
    }
}