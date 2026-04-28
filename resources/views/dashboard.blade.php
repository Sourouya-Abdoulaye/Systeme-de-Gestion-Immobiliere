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

    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Inter, sans-serif;
        }
    </style>
</head>

<!-- BODY -->

<body class="bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-white transition">

    <div class="flex min-h-screen">

        <!-- OVERLAY -->
        <div id="overlay" class="fixed inset-0 bg-black/50 hidden z-40 md:hidden"></div>

        <!-- SIDEBAR -->
        <aside id="sidebar" class="w-64 bg-blue-950 dark:bg-slate-800 text-white flex flex-col
fixed md:sticky top-0 left-0 h-screen z-50
transform -translate-x-full md:translate-x-0
transition-transform duration-300">

            <!-- MOBILE HEADER -->
            <div class="md:hidden flex justify-between items-center p-4 border-b border-blue-900 dark:border-slate-700">
                <div>
                    <h1 class="font-semibold text-lg">🏛️ Admin Immo</h1>
                    <p class="text-xs text-blue-200">Gestion immobilière</p>
                </div>
                <button id="closeSidebar" class="text-white text-2xl">✕</button>
            </div>

            <!-- DESKTOP HEADER -->
            <div class="hidden md:block p-5 border-b border-blue-900 dark:border-slate-700">
                <h1 class="font-semibold text-lg">🏛️ Admin Immo</h1>
                <p class="text-xs text-blue-200">Gestion immobilière</p>
            </div>

            <nav class="p-4 space-y-1 text-sm">

                <a class="block px-3 py-2 rounded-lg bg-blue-900 dark:bg-slate-700"
                    href="{{ route('dashboard') }}">Dashboard</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700"
                    href="{{ route('biens.index') }}">Statistique</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700"
                    href="{{ route('biens.index') }}">Aceuil</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700"
                    href="{{ route('biens.index') }}">Users</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700"
                    href="{{ route('biens.index') }}">Clients</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700"
                    href="{{ route('biens.index') }}">Prorietaires</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700"
                    href="{{ route('admin.biens.create') }}">Ajouter</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700">Utilisateurs</a>

                <a class="block px-3 py-2 rounded-lg hover:bg-blue-900 dark:hover:bg-slate-700"
                    href="{{ route('profile.edit') }}">Profile</a>

            </nav>

            <div class="mt-auto p-4 text-xs text-blue-200 border-t border-blue-900 dark:border-slate-700">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-2 px-3 py-2 bg-red-500 text-white rounded">
                        <i class="fas fa-sign-out-alt"></i>
                        Se déconnecter
                    </button>
                </form>

                <span>© 2026 Admin Immobilier</span>
            </div>

        </aside>

        <!-- MAIN -->
        <main class="flex-col w-full">

            <!-- TOPBAR -->
            <header class="bg-white dark:bg-slate-800 border-b sticky top-0 z-10 ">
                <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-4 flex">
                    <div>
                    <button id="openSidebar" class="md:hidden text-blue-950 dark:text-white text-xl">
                        ☰
                    </button>
                    </div>

                    <div class="flex items-center justify-end gap-3">

                        <!-- THEME TOGGLE -->
                        <button onclick="toggleTheme()"
                            class="px-3 py-2 rounded-lg bg-slate-200 dark:bg-slate-700 text-sm">
                             ☀️
                        </button>

                        <button class="relative text-blue-950 dark:text-white" onclick="alert('Aucune notification')">
                            🔔
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1 rounded-full">3</span>
                        </button>

                        <a href="{{route('admin.biens.create')}}">
                            <button class="bg-blue-900 dark:bg-orange-500 text-white px-4 py-2 rounded-lg text-sm">
                                + Ajouter
                            </button>
                        </a>

                        <span class="text-sm hidden sm:block">{{ Auth::user()->name }}</span>

                    </div>

                </div>
            </header>

            @yield('content')
           
        </main>
    </div>

    <!-- JS MENU -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function openMenu() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeMenu() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        document.getElementById('openSidebar').addEventListener('click', openMenu);
        document.getElementById('closeSidebar').addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);

        /* DARK MODE */
        function toggleTheme() {
            document.documentElement.classList.toggle('dark');

            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        }

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }

        lucide.createIcons();
    </script>

</body>

</html>