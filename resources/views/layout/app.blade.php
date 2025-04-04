<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="bg-gray-800 text-white w-64 p-6">
            <h2 class="text-2xl font-semibold text-center mb-6">Menu</h2>
            <ul>
                <li><a href="/" class="block py-2 px-4 hover:bg-gray-600">Dashboard</a></li>
                <li><a href="{{ route('employers.index') }}" class="block py-2 px-4 hover:bg-gray-600">Listes des employers</a></li>
                <li><a href="{{ route('employers.create') }}" class="block py-2 px-4 hover:bg-gray-600">Ajouter employer</a></li>
                <li><a href="" class="block py-2 px-4 hover:bg-gray-600">Listes des emplois</a></li>
                <li><a href="" class="block py-2 px-4 hover:bg-gray-600">Ajouter emploi</a></li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-8">
            {{--debut contenu --}}
                @yield('contenu')
            {{-- fin contenu --}}
        </div>
    </div>

</body>
</html>
