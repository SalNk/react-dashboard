<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {
        $totalDepartements = Departement::all()->count();
        $totalEmployes = Employe::all()->count();
        $totalAdmins = User::all()->count();
        return view('pages.dashboard', [
            'totalDepartements' => $totalDepartements,
            'totalEmployes' => $totalEmployes,
            'totalAdmins' => $totalAdmins
        ]);
    }


}