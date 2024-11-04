<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Default: 5 items per page
        $users = User::all(); // Example: Also paginating users
        $categories = Category::all(); // Example: Also paginating categories

        return view('admin.index', compact('products', 'users', 'categories'));
    }
}
