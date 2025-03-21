<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
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

    public function edit(Medicine $medicine)
    {
        return Inertia::render('Medicine/EditMedicine', [
            'medicine' => $medicine
        ]);
    }

    public function destroy(Medicine $id)
    {
        dd($id);
        $medicine->delete();
        return redirect()->back()->with('success', 'Medicamento eliminado');
    }
}
