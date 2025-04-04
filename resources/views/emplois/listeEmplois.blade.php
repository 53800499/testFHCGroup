@extends('layout.app')

@section('title')
	Home
@endsection
@section('contenu')

<div class="font-sans bg-gray-100">
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6">Emplois List</h1>

        @if (session('success'))
            <div class="bg-green-200 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-between items-center -mx-4">
            <div class="m-6">

            <a href="{{ route('emplois.create') }}" class="bg-blue-500 text-white p-2 rounded mb-4">Ajouter un nouveau Emplois</a>
            </div>
            <div class="mb-4">
                <form method="GET" action="{{ route('emplois.index') }}" class="flex items-center gap-4">
                    <label for="status" class="font-semibold">Filtrer par statut :</label>
                    <select name="status" id="status" onchange="this.form.submit()" class="p-2 border rounded">
                        <option value="">-- Tous --</option>
                        <option value="brouillon" {{ request('status') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                        <option value="publiee" {{ request('status') == 'publiee' ? 'selected' : '' }}>Publiée</option>
                        <option value="fermee" {{ request('status') == 'fermee' ? 'selected' : '' }}>Fermée</option>
                    </select>
                </form>
            </div>
        </div>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b text-left">#</th>
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">position</th>
                    <th class="py-2 px-4 border-b text-left">department</th>
                    <th class="py-2 px-4 border-b text-left">hire_date</th>
                    <th class="py-2 px-4 border-b text-left">salary</th>
                    <th class="py-2 px-4 border-b text-left">status</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $colors = [
                        'brouillon' => 'bg-gray-200 text-gray-800',
                        'publiee' => 'bg-green-200 text-green-800',
                        'fermee' => 'bg-red-200 text-red-800',
                    ];
                @endphp

                @foreach($emplois as $emploi)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $emploi->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $emploi->title }}</td>
                        <td class="py-2 px-4 border-b">{{ Str::limit($emploi->description, 50) }}</td>
                        <td class="py-2 px-4 border-b">{{ $emploi->location }}</td>
                        <td class="py-2 px-4 border-b">{{ $emploi->department }}</td>
                        <td class="py-2 px-4 border-b">{{ $emploi->salary_range ?? 'Non précisé' }}</td>
                        <td class="py-2 px-4 border-b">{{ $emploi->deadline ? \Carbon\Carbon::parse($emploi->deadline)->format('d/m/Y') : 'Aucune' }}</td>
                        <td class="py-2 px-4 border-b">
                            <span class="px-2 py-1 rounded {{ $colors[$emploi->status] }}">
                                {{ ucfirst($emploi->status) }}
                            </span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('emplois.edit', $emploi->id) }}" class="bg-yellow-500 text-white p-2 rounded">Modifier</a>
                            <form action="{{ route('emplois.destroy', $emploi->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
