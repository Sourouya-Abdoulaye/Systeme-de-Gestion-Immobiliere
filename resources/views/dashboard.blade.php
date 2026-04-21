<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Immobilier</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: Inter, sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <div class="flex min-h-screen">

        <!-- OVERLAY -->
        <div id="overlay" class="fixed inset-0 bg-black/50 hidden z-40 md:hidden"></div>

        <!-- SIDEBAR -->
        <aside id="sidebar" class="w-64 bg-blue-950 text-white flex flex-col
  fixed md:sticky top-0 left-0 h-screen z-50
  transform -translate-x-full md:translate-x-0
  transition-transform duration-300">

            <!-- MOBILE HEADER -->
            <div class="md:hidden flex justify-between items-center p-4 border-b border-blue-900">
                <div>
                    <h1 class="font-semibold text-lg">🏛️ Admin Immo</h1>
                    <p class="text-xs text-blue-200 mt-1">Gestion immobilière</p>
                </div>
                <button id="closeSidebar" class="text-white text-2xl">✕</button>
            </div>

            <!-- DESKTOP HEADER -->
            <div class="hidden md:block p-5 border-b border-blue-900">
                <h1 class="font-semibold text-lg">🏛️ Admin Immo</h1>
                <p class="text-xs text-blue-200 mt-1">Gestion immobilière</p>
            </div>

            <nav class="p-4 space-y-1 text-sm">

                <a class="block px-3 py-2 rounded-lg bg-blue-900" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900" href="{{ route('bien.index') }}">Biens</a>
                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900"
                    href="{{ route('admin.bien.create') }}">Ajouter</a>
                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900">Utilisateurs</a>
                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900" href="{{ route('profile.edit') }}">Profile</a>


            </nav>







            <div class="mt-auto p-4 text-xs text-blue-200 border-t border-blue-900">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-2 px-3 py-2 bg-red-500 text-white rounded">
                        <i class="fas fa-sign-out-alt"></i>
                        Se déconnecter
                    </button>
                </form>
                <span>© 2026 Admin Immobillier</span>
            </div>

        </aside>

        <!-- MAIN -->
        <main class="flex-1">

            <!-- TOPBAR -->
            <header class="bg-white border-b sticky top-0 z-10">
                <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-4">

                    <!-- MOBILE BUTTON -->
                    <button id="openSidebar" class="md:hidden text-blue-950 text-xl">
                        ☰
                    </button>

                    <div class="flex-1 max-w-md hidden sm:block"></div>

                    <div class="flex items-center gap-3">


                        <button class="relative text-blue-950" onclick="alert('Aucune notification')">
                            🔔
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1 rounded-full">3</span>
                        </button>

                        <a href="{{route('admin.bien.create')}}">
                            <button class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm">
                                + Ajouter
                            </button>
                        </a>



                        <div class="flex items-center gap-2 ml-2 justify-between">
                            <!-- <div class="w-8 h-8 rounded-full bg-slate-300">
                              <img src="{{ asset('images/IMG-20240922-WA0101.jpg') }}" alt="A">
                            </div> -->

                            <span class="text-sm hidden sm:block"> {{ Auth::user()->name }}</span>

                        </div>

                    </div>

                </div>
            </header>

            <!-- CONTENT -->
            <section class="max-w-full mx-auto px-4 py-6 space-y-6">

                <div class="w-full grid grid-cols-1 sm:grid-cols-3 gap-4">

                    <div class="bg-white rounded-xl p-5 border">
                        <p class="text-sm text-slate-500">Biens</p>
                        <p class="text-2xl font-semibold text-blue-950">1 250</p>
                    </div>

                    <div class="bg-white rounded-xl p-5 border">
                        <p class="text-sm text-slate-500">Transactions</p>
                        <p class="text-2xl font-semibold text-blue-950">320</p>
                    </div>

                    <div class="bg-white rounded-xl p-5 border">
                        <p class="text-sm text-slate-500">Régions</p>
                        <p class="text-2xl font-semibold text-blue-950">15</p>
                    </div>

                </div>

                <div class="bg-white rounded-xl border overflow-hidden w-full">

                    <div class="p-4 border-b flex flex-col sm:flex-row sm:justify-between gap-3 sm:items-center">
                        <h2 class="font-semibold text-blue-950">Derniers biens</h2>

                        <div class="flex gap-2">
                            <select class="border rounded-lg px-2 py-2 text-sm">
                                <option>Tous</option>
                                <option>Disponible</option>
                                <option>Vendu</option>
                            </select>

                            <input placeholder="Rechercher..."
                                class="border rounded-lg px-3 py-2 text-sm w-full sm:w-56">
                        </div>
                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm md:table">
                            <thead class="bg-slate-50 text-slate-500 hidden md:table-header-group">
                                <tr>
                                    <th class="text-left p-3">Titre</th>
                                    <th class="text-left p-3">Ville</th>
                                    <th class="text-left p-3">Prix</th>
                                    <th class="text-left p-3">Statut</th>
                                    <th class="text-right p-3">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="border-t hover:bg-slate-50 transition">
                                    <td class="p-3 font-medium text-blue-950">Maison Luxe</td>
                                    <td class="p-3 text-slate-500">Lomé</td>
                                    <td class="p-3 text-cyan-700 font-semibold">120 000$</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-50 text-green-700">
                                            Disponible
                                        </span>
                                    </td>
                                    <td class="p-3 text-right space-x-2">

                                        <!-- SHOW -->
                                         <a href="#bien.show">
                                            <button class="text-blue-600 hover:text-blue-800">
                                                <i data-lucide="eye" class="w-5 h-5"></i>
                                            </button>
                                         </a>
                                        

                                        <!-- UPDATE -->
                                          <a href="{{route('admin.bien.edit',['id'=>1])}}">
                                            <button class="text-blue-600 hover:text-blue-800">
                                                 <i data-lucide="edit-3" class="w-5 h-5"></i>
                                            </button>
                                         </a>


                                        <!-- DELETE -->
                                        <form action="{{route('admin.bien.delete',['id'=>1])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </button type="submit">
                                        </form>
                                    </td>
                                </tr>
                                <tr class="border-t hover:bg-slate-50 transition">
                                    <td class="p-3 font-medium text-blue-950">Appartement Moderne</td>
                                    <td class="p-3 text-slate-500">Lomé</td>
                                    <td class="p-3 text-cyan-700 font-semibold">80 000$</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-50 text-yellow-700">
                                            Loué
                                        </span>
                                    </td>
                                    <td class="p-3 text-right space-x-2">

                                        <!-- SHOW -->
                                         <a href="#bien.show">
                                            <button class="text-blue-600 hover:text-blue-800">
                                                <i data-lucide="eye" class="w-5 h-5"></i>
                                            </button>
                                         </a>
                                        

                                        <!-- UPDATE -->
                                          <a href="{{route('admin.bien.edit',['id'=>23])}}">
                                            <button class="text-blue-600 hover:text-blue-800">
                                                 <i data-lucide="edit-3" class="w-5 h-5"></i>
                                            </button>
                                         </a>


                                        <!-- DELETE -->
                                        <form action="{{route('admin.bien.delete',['id'=>23])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </button type="submit">
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>

            </section>

        </main>
    </div>

    <!-- JS MOBILE MENU -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        function openMenu() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeMenu() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        openBtn.addEventListener('click', openMenu);
        closeBtn.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMenu();
        });

        lucide.createIcons();
    </script>

</body>

</html>