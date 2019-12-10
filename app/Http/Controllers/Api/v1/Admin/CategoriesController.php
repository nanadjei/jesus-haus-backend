<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['jwt.admin.auth']);
    }

    /**
     * Get categories by slug
     */
    public function getCategoriesBySlug($type)
    {
        $categories = Category::whereType($type)->get();

        return responder()->success($categories)->respond();
    }
}
