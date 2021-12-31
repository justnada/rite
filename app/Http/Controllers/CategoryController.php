<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index() {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category) {
        return view('posts', [
            'title' => "Category $category->name",
            'posts' => $category->posts->load('author', 'category'),
            'active' => 'categories',
            'categories'=> Category::all()
        ]);
    }
    
}

