@extends('layout.app')

@section('title')
	Home
@endsection
@section('contenu')

<div class="font-sans bg-gray-100">

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6">Créer un Employeur</h1>

        <!-- Affichage des erreurs de validation -->
        @if ($errors->any())
            <div class="bg-red-200 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire pour créer un employeur -->
        <form action="{{ route('employers.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Champ Nom -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="nom" name="nom" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('nom') }}" required>
                </div>

                <!-- Champ Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('email') }}" required>
                </div>

                <!-- Champ Position -->
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="position" name="position" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('position') }}" required>
                </div>

                <!-- Champ Département -->
                <div>
                    <label for="departement" class="block text-sm font-medium text-gray-700">Département</label>
                    <input type="text" id="departement" name="departement" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('departement') }}" required>
                </div>

                <!-- Champ Date d'embauche -->
                <div>
                    <label for="hire_date" class="block text-sm font-medium text-gray-700">Date d'embauche</label>
                    <input type="date" id="hire_date" name="hire_date" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('hire_date') }}" required>
                </div>

                <!-- Champ Salaire -->
                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700">Salaire</label>
                    <input type="number" id="salary" name="salary" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('salary') }}" required>
                </div>

                <!-- Champ Statut -->
                <div>
                    <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="statut" name="statut" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                        <option value="actif" {{ old('statut') == 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="inactif" {{ old('statut') == 'inactif' ? 'selected' : '' }}>En congé</option>
                        <option value="inactif" {{ old('statut') == 'inactif' ? 'selected' : '' }}>licencié</option>
                    </select>
                </div>

            </div>

            <!-- Bouton Soumettre -->
            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Ajouter l'Employeur</button>
            </div>

        </form>
    </div>

</div>

@endsection
