@extends('layout.app')

@section('title')
    Modifier l'emploi
@endsection

@section('contenu')

<div class="font-sans bg-gray-100">

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6">Modifier un Emploi</h1>

        @if (session('success'))
            <div class="bg-green-200 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-200 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('emplois.update', $emploi->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Titre de l'emploi -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('title', $emploi->title) }}" required>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>{{ old('description', $emploi->description) }}</textarea>
                </div>

                <!-- Lieu -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Lieu</label>
                    <input type="text" id="location" name="location" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('location', $emploi->location) }}" required>
                </div>

                <!-- Département -->
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-700">Département</label>
                    <input type="text" id="department" name="department" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('department', $emploi->department) }}" required>
                </div>

                <!-- Plage salariale -->
                <div>
                    <label for="salary_range" class="block text-sm font-medium text-gray-700">Plage salariale</label>
                    <input type="text" id="salary_range" name="salary_range" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('salary_range', $emploi->salary_range) }}">
                </div>

                <!-- Date limite -->
                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700">Date limite</label>
                    <input type="date" id="deadline" name="deadline" class="mt-1 block w-full p-2 border border-gray-300 rounded" value="{{ old('deadline', $emploi->deadline ? $emploi->deadline->format('Y-m-d') : '') }}">
                </div>

                <!-- Statut -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="status" name="status" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                        <option value="brouillon" {{ old('status', $emploi->status) == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                        <option value="publiee" {{ old('status', $emploi->status) == 'publiee' ? 'selected' : '' }}>Publiée</option>
                        <option value="fermee" {{ old('status', $emploi->status) == 'fermee' ? 'selected' : '' }}>Fermée</option>
                    </select>
                </div>

            </div>

            <!-- Bouton -->
            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Mettre à jour l'emploi</button>
            </div>

        </form>
    </div>

</div>

@endsection
