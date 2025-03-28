<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriasController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
