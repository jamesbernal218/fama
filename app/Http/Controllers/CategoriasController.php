<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriasController extends Controller
{
    public function categories(Request $request)
    {
        $paginate = 10;
        if ($request->paginate) {
            $paginate = (int)$request->paginate;
        }
        $info = Category::searching()
            ->orderBy('id', 'ASC')
            ->paginate($paginate);

        return Inertia::render("Categories/Categories",  [
            'info' => $info,
            'search' => request()->search,
            'paginate' => $paginate
        ]);
    }

    public function addCategories(Request $request)
    {
        if ($request->isMethod('POST')) {
            dd($request->all());
            Category::create($request->all());
            return redirect()->back()->with('success', 'Categoria agregada exitosamente');
        }

        $categorias = Category::orderBy('id', 'ASC')
            ->get();

        return Inertia::render(
            "Categories/AddCategories",
            ['categorias' => $categorias]
        );
    }

    public function updateCategories(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            Category::findOrFail($id)->update($request->all());
            return redirect()->back()->with('success', 'Categorias actualizadas exitosamente');
        }
        $info = Category::findOrFail($id);
        return Inertia::render(
            "Categories/UpdateCategories",
            [
                'info' => $info
            ]
        );
    }

    public function deleteCategories(Request $request, $id)
    {
        Category::findOrFail($id)->delete();
    }

    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
