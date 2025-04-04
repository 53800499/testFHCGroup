@extends('layout.app')

@section('title')
	Home
@endsection
@section('contenu')

<div class="font-sans bg-gray-100">
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6">Employers List</h1>

        @if (session('success'))
            <div class="bg-green-200 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="m-6">

        <a href="{{ route('employers.create') }}" class="bg-blue-500 text-white p-2 rounded mb-4">Add New Employer</a>
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
                @foreach($employers as $employer)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $employer->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $employer->nom }}</td>
                        <td class="py-2 px-4 border-b">{{ $employer->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $employer->position }}</td>
                        <td class="py-2 px-4 border-b">{{ $employer->departement }}</td>
                        <td class="py-2 px-4 border-b">{{ $employer->hire_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $employer->salary }}</td>
                        <td class="py-2 px-4 border-b">{{ $employer->status }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('employers.edit', $employer->id) }}" class="bg-yellow-500 text-white p-2 rounded">Edit</a>
                            <form action="{{ route('employers.destroy', $employer->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
