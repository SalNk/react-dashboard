<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Departement;
use App\Models\Employe;
use Exception;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::with('departement')->paginate(10);

        // dd($employes);
        return view('employe.index', compact('employes'));
    }
    public function create()
    {
        $departements = Departement::all();
        return view('employe.create', compact('departements'));
        ;
    }

    public function edit(Employe $employe)
    {
        $departements = Departement::all();
        return view('employe.edit', compact('employe', 'departements'));
    }

    public function update(Employe $employe, UpdateEmployeRequest $request)
    {
        $employe->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'montant_journalier' => $request->montant_journalier,
            'departement_id' => $request->departement_id
        ]);

        return redirect()->route('employe.index')->with('success', 'Employé mis à jour');




        // try {
        //     $employe->name = $request->name;
        //     $employe->status = $request->status;

        //     $employe->save();
        //     return redirect()->route('employe.index')->with('success', 'Employé mis à jour');
        // } catch (Exception $e) {
        //     dd($e);
        // }



    }

    public function store(EmployeRequest $request)
    {
        $query = Employe::create($request->all());

        if ($query) {
            return redirect()->route('employe.index')->with('success', 'Employé ajouté avec succès');
        }
    }

    public function delete(Employe $employe)
    {
        try {
            $employe->delete();

            return redirect()->route('employe.index')->with('success', 'Employé supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }
}

// public function toGetUniversityAcademicYear($university_id): \Illuminate\Support\Collection
// 	{
// 		$academicYearUniversity = AcademicYearUniversity::join('academic_years', 'academic_years.id', '=', 'academic_year_universities.academic_year_id')
// 			->select('academic_years.*', 'status','apply_open','academic_year_universities.id as academic_year_university_id')
// 			->where('university_id', $university_id)
// 			->get();
// 		return $academicYearUniversity;
// 	}