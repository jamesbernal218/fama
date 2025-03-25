<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MedicineController extends Controller
{
    public function medicine(Request $request)
    {
        $paginate = 10;
        if ($request->paginate) {
            $paginate = (int)$request->paginate;
        }
        $info = Medicine::searching()
            ->orderBy('id', 'ASC')
            ->paginate($paginate)
            ->withQueryString();
        return Inertia::render("Medicine/Medicine",  [
            'info' => $info,
            'search' => request()->search,
            'paginate' => $paginate
        ]);
    }
    public function addMedicine(Request $request)
    {
        if ($request->isMethod('POST')) {
            Medicine::create($request->all());
            return redirect()->route('medicine')->with('success', 'Medicamento agregado correctamente');
        }
        return Inertia::render("Medicine/AddMedicine");
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            Medicine::findOrFail($id)->update($request->all());
        }
        $info = Medicine::findOrFail($id);
        return Inertia::render('Medicine/EditMedicine', [
            'info' => $info
        ]);
    }

    public function destroy(Medicine $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Medicamento eliminado');
    }

    public function test()
    {
        $providers = Supplier::all();

        return response()->json($providers);
    }
}
