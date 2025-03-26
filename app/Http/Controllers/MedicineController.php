<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MedicineController extends Controller
{
    /**
     * Muestra la lista de todos los medicamentos con paginación.
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function medicine(Request $request)
    {
        $paginate = 50;

        $info = Medicine::searching()
            ->orderBy('id', 'ASC')
            ->paginate($paginate);

        return Inertia::render("Medicine/Medicine", [
            'info' => $info,
            'search' => request()->search,
            'paginate' => $paginate
        ]);
    }

    /**
     * Muestra el formulario para agregar un nuevo medicamento.
     * Si la solicitud es de tipo POST, guarda el medicamento en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function addMedicine(Request $request)
    {
        if ($request->isMethod('POST')) {
            Medicine::create($request->all());
            return redirect()->route('medicine')->with('success', 'Medicamento agregado correctamente');
        }

        return Inertia::render("Medicine/AddMedicine");
    }

    /**
     * Muestra el formulario para editar un medicamento.
     * Si la solicitud es de tipo PUT, actualiza el medicamento en la base de datos.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            Medicine::findOrFail($id)->update($request->all());
            return redirect()->route('medicine')->with('success', 'Medicamento actualizado correctamente');
        }

        $info = Medicine::findOrFail($id);
        return Inertia::render('Medicine/EditMedicine', [
            'info' => $info
        ]);
    }

    /**
     * Elimina un medicamento de la base de datos.
     *
     * @param Medicine $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Medicine $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Medicamento eliminado');
    }
}
