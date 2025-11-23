<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * عرض صفحة مجموعات التصاميم.
     */
    /**
     * عرض صفحة مجموعات التصاميم الكاملة.
     */
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        // Default to showing all designs initially, or let the view handle the initial load via AJAX if preferred.
        // For SEO and initial render, it's better to pass them.
        $designs = Design::with('category')->get();

        return view('pages.collections', compact('categories', 'designs'));
    }

    /**
     * فلترة التصاميم عبر AJAX.
     */
    public function filter(Request $request)
    {
        $categoryId = $request->input('category_id');

        $query = Design::with('category');

        if ($categoryId && $categoryId !== 'all') {
            $query->where('category_id', $categoryId);
        }

        $designs = $query->get();

        // Return just the grid partial
        return view('partials.designs-grid', compact('designs'))->render();
    }
}
