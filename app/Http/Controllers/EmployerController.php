<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Afficher la liste des employeurs
    public function index()
    {
        $employers = Employer::all(); // Récupérer tous les employeurs
        return view('admin.listeEmployer', compact('employers'));
    }

/*
public function index(Request $request)
    {
        // Récupérer les filtres
        $departement = $request->input('departement');
        $statut = $request->input('statut');

        // Filtrer les employeurs
        $employers = Employer::query()
            ->when($departement, function ($query, $departement) {
                return $query->where('departement', $departement);
            })
            ->when($statut, function ($query, $statut) {
                return $query->where('statut', $statut);
            })
            ->paginate(10);  // Pagination de 10 employeurs par page

        return view('employers.index', compact('employers'));
    }
}
 */
    // Afficher le formulaire pour créer un nouvel employeur
    public function create()
    {
        return view('admin.storeEmployer'); // Vue pour ajouter un employeur
    }

    // Enregistrer un nouvel employeur dans la base de données
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:employers,email|max:191',
            'position' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'salary' => 'required|integer',
            'statut' => 'required|in:actif,inactif',
        ]);

        // Créer un nouvel employeur
        Employer::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'position' => $request->position,
            'departement' => $request->departement,
            'hire_date' => $request->hire_date,
            'salary' => $request->salary,
            'statut' => $request->statut,
        ]);

        // Rediriger avec un message de succès
    return redirect()->route('employers.create')->with('success', 'Employeur ajouté avec succès!');
    }

    // Afficher le formulaire pour éditer un employeur existant
    public function edit($id)
    {
        $employer = Employer::findOrFail($id); // Trouver l'employeur par ID
        return view('admin.editEmployer', compact('employer'));
    }

    // Mettre à jour les informations d'un employeur existant
    public function update(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:191|unique:employers,email,' . $id,
            'position' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'salary' => 'required|integer',
            'statut' => 'required|in:actif,inactif',
        ]);

        // Trouver l'employeur par ID et mettre à jour ses informations
        $employer = Employer::findOrFail($id);
        $employer->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'position' => $request->position,
            'departement' => $request->departement,
            'hire_date' => $request->hire_date,
            'salary' => $request->salary,
            'statut' => $request->statut,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('employers.index')->with('success', 'Employeur mis à jour avec succès!');
    }

    // Supprimer un employeur
    public function destroy($id)
    {
        // Trouver l'employeur par ID et le supprimer
        $employer = Employer::findOrFail($id);
        $employer->delete();

        // Rediriger avec un message de succès
        return redirect()->route('employers.index')->with('success', 'Employeur supprimé avec succès!');
    }
}
