<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigurationRequest;
use App\Models\Configuration;
use Exception;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
   public function index()
   {
      $allConfiguration = Configuration::latest()->paginate(10);
      return view('config.index', compact('allConfiguration'));
   }

   public function create()
   {
      return view('config.create');
   }

   public function store(StoreConfigurationRequest $request, Configuration $config)
   {
      try {
         $config::create($request->all());
         return redirect()->route('config.index')->with('succes', 'Configuration ajoutée avec succès');
      } catch (Exception $e) {
         throw new Exception('Erreur lors de l\'enregistrement');
      }
   }

   public function delete(Configuration $config)
   {
      try {
         $config->delete();
         return redirect()->route('config.index')->with('success', 'Configuration supprimée');

      } catch (Exception $e) {
         dd($e);
      }
   }
}