<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order_rule;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('active', true)->get();
        return view('products.index')
                ->with(compact('products'))
                ->with(compact('categories'));
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        return view('products.show')
                ->with(compact('product'))
                ->with(compact('categories'));
    }

    public function order(Product $product, Request $request)
    {
        $rule = new Order_rule();
        $rule->product = $product;
        $rule->type = $request->type;
        $rule->size = $request->size;

        $request->session()->push('cart', $rule);
        return redirect()->route('cart');
    }

    public function app(Request $request, Category $category)
    {
        $categories = Category::all();	
        $products = Product::where('category_id', '=', $category->id)->get();
        return view('layouts/category')
                ->with(compact('products'))
                ->with(compact('categories'));
    }
}
