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
    public function index($category = null)
    {
        $categories = Category::where('is_active', true)->get();

        $query = Design::with('category');

        if ($category && $category !== 'all') {
            $categoryModel = Category::where('slug', $category)->first();

            if ($categoryModel) {
                $query->where('category_id', $categoryModel->id);
            } else {
                // If category slug is invalid, you might want to show 404 or just show all.
                // For now, let's return 404 to be correct.
                abort(404);
            }
        }

        $designs = $query->get();

        // Pass the current category slug to the view to highlight the active tab
        $currentCategory = $category;

        return view('pages.collections', compact('categories', 'designs', 'currentCategory'));
    }
}
