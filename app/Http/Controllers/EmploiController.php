<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Afficher la liste des emplois
    public function index(Request $request)
{
    $status = $request->input('status');

    $query = Emploi::query();

    if ($status) {
        $query->where('status', $status);
    }

    $emplois = $query->orderBy('created_at', 'desc')->get();

    return view('emplois.listeEmplois', compact('emplois'));
}


/*
public function index(Request $request)
    {
        // Récupérer les filtres
        $departement = $request->input('departement');
        $statut = $request->input('statut');

        // Filtrer les emplois
        $emploiss = Emplois::query()
            ->when($departement, function ($query, $departement) {
                return $query->where('departement', $departement);
            })
            ->when($statut, function ($query, $statut) {
                return $query->where('statut', $statut);
            })
            ->paginate(10);  // Pagination de 10 emplois par page

        return view('emplos.index', compact('emplos'));
    }
}
 */
    // Afficher le formulaire pour créer un nouvel employeur
    public function create()
    {
        return view('emplois.storeEmplois'); // Vue pour ajouter un employeur
    }

    // Enregistrer un nouvel employeur dans la base de données
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
            'status' => 'required|in:brouillon,publiee,fermee',
        ]);

        // Créer un nouvel emploi
        Emploi::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'department' => $request->department,
            'requirements' =>'Oui',
            'recruiter_id' =>5,
            'salary_range' => $request->salary_range,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        // Redirection avec message de succès
        return redirect()->route('emplois.create')->with('success', 'Emploi ajouté avec succès !');
    }


    // Afficher le formulaire pour éditer un employeur existant
    public function edit($id)
    {
        $emploi = Emploi::findOrFail($id);
        return view('emplois.editEmplois', compact('emploi'));
    }


    // Mettre à jour les informations d'un employeur existant
    public function update(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
            'status' => 'required|in:brouillon,publiee,fermee',
        ]);

        // Trouver l'emploi par ID et mettre à jour ses informations
        $emploi = Emploi::findOrFail($id);
        $emploi->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'department' => $request->department,
            'salary_range' => $request->salary_range,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('emplois.index')->with('success', 'Emploi mis à jour avec succès !');
    }


    // Supprimer un employeur
    public function destroy($id)
    {
        // Trouver l'employeur par ID et le supprimer
        $emplois = Emploi::findOrFail($id);
        $emplois->delete();

        // Rediriger avec un message de succès
        return redirect()->route('emplois.destroy')->with('success', 'Employeur supprimé avec succès!');
    }
}