<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

    public function newProducts(Request $request)
    {
        $newProducts = Product::where('created_at', '>=', now()->subDays(20))
            ->orderBy('created_at', 'desc')
            ->get();

        $productCount = Product::where('created_at', '>=', now()->subDays(20))->count();

        return view('shop-new', compact('newProducts', 'productCount'));
    }

    public function showByCategory(Request $request, $categorySlug)
    {
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

        $products = $query->get();

        return view('shop', compact('products', 'category', 'productCount', 'selectedSort'));
    }

    public function allProducts(Request $request)
    {
        $selectedSort = $request->input('sort', 'latest');

        $productCount = Product::all()->count();

        $query = Product::query();

        if ($selectedSort === 'high_to_low') {
            $query->orderBy('product_price', 'desc');
        } elseif ($selectedSort === 'low_to_high') {
            $query->orderBy('product_price', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->get();

        return view('shop-all', compact('productCount', 'products', 'selectedSort'));
    }

    public function showMore(Request $request)
    {
        $filter = $request->query('filter');
        $categoryName = $this->getCategoryName($filter);
        $products = $this->getFilteredProducts($filter);

        return view('shop-more', compact('products', 'categoryName'));
    }

    private function getFilteredProducts($filter)
    {
        switch ($filter) {
            case 'italy':
                return Product::where('italy', true)->get();
            case 'autumn':
                return Product::where('autumn', true)->get();
            case 'spring':
                return Product::where('spring', true)->get();
            case 'accessories':
                return Product::where('accessories', true)->get();
            default:
                return collect();
        }
    }

    private function getCategoryName($filter)
    {
        switch ($filter) {
            case 'italy':
                return 'MADE IN ITALY';
            case 'autumn':
                return 'AUTUMN/WINTER';
            case 'spring':
                return 'SPRING/SUMMER';
            case 'accessories':
                return 'ACCESSORIES';
            default:
                return 'ALL ITEMS';
        }
    }


    public function shopSingle(Request $request)
    {
        $product = Product::whereSlug($request->slug)->firstOrFail();
        $sizes = json_decode($product->product_size, true) ?? [];
        $colors = json_decode($product->product_color, true) ?? [];
        return view('shop-single', compact('product', 'sizes', 'colors'));
    }
}
