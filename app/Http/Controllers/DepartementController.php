<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementRequest;
use App\Models\Departement;
use Exception;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::paginate(10);
        return view('departement.index', compact('departements'));
    }
    public function create()
    {
        return view('departement.create');
    }
    public function store(Departement $departement, saveDepartementRequest $request)
    {
        try {
            $departement::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('departement.index')->with('success', 'Département crée avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function edit(Departement $departement)
    {
        return view('departement.edit', compact('departement'));
    }
    public function update(Departement $departement, saveDepartementRequest $request)
    {
        try {
            $departement->name = $request->name;
            $departement->status = $request->status;

            $departement->save();
            return redirect()->route('departement.index')->with('success', 'Département mis à jour');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete(Departement $departement)
    {
        try {
            $departement->delete();

            return redirect()->route('departement.index')->with('success', 'Département supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }

}