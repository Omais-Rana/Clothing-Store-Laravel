<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use TCG\Voyager\Facades\Voyager;

class ProductController extends Controller
{
    public function showByCategory(Request $request, $categorySlug)
    {
        // Fetch the selected sorting option from the request
        $selectedSort = $request->input('sort', 'latest');

        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $productCount = Product::where('category_name', $category->category_name)->count();

        $query = Product::where('category_name', $category->category_name);

        if ($selectedSort === 'high_to_low') {
            $query->orderBy('product_price', 'desc');
        } elseif ($selectedSort === 'low_to_high') {
            $query->orderBy('product_price', 'asc');
        } else {
            $query->latest();
        }

        // Fetch products and paginate the results
        $products = $query->paginate(12);

        return view('shop', compact('products', 'category', 'productCount', 'selectedSort'));
    }

    public function shopSingle(Request $request)
    {
        $product = Product::whereSlug($request->slug)->firstOrFail();
        return view('shop-single', compact('product'));
    }

    public function search(Request $request)
    {
        $term = $request->input('term');
        $products = Product::where('product_name', 'like', '%' . $term . '%')
            ->orWhere('product_tags', 'like', '%' . $term . '%')
            ->paginate(12);

        return view('shop-search', compact('products', 'term'));
    }
}
