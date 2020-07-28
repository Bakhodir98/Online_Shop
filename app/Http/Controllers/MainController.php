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
        $images = Image::get();
        // dd($products);
        return view('index', compact('products'));
    }
    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function product($product_code = null)
    {
        // dd($product);
        $product = Product::where('code',$product_code)->first();
        $images = Image::get();
        return view('product', compact('product', 'images'));
    }
    public function category($category = null)
    {
        $categoryObject = Category::where('code', $category)->first();
        //   dd($categoryObject->id);
        $products = Product::where('category_id', $categoryObject->id)->get();
        // dd($products->image);
        return view('category', compact('category','products'));
    }
}