<!DOCTYPE html>
<html lang="fr" class="transition duration-300">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre','gestion immobillier')   </title>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        tailwind.config = { darkMode: 'class' }

    </script>

</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">

            <a href="{{ route('biens.index') }}" class="text-xl font-bold text-orange-500">
                GESTION IMMOBILIER
            </a>

            <div class="hidden md:flex gap-6 items-center">
                <a href="{{ route('biens.index') }}">Aceuil</a>
                <a href="#biens">Biens</a>
                <a href="#propos">A propos</a>
                <a href="{{route('contact')}}">Contact</a>

                @auth
                <a class="text-orange-500" href="{{ route('dashboard') }}">Dashboard</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-500">Logout</button>
                </form>
                @else
                <a class="text-orange-500" href="{{ route('login') }}">Login</a>
                @endauth

                <button onclick="toggleDark()">🌙</button>

            </div>

            <button class="md:hidden" onclick="toggleMenu()">☰</button>
        </div>

        <div id="mobileMenu" class="hidden px-4 pb-4 md:hidden flex justify-between flex-col gap-3">

            <a href="{{ route('biens.index') }}">Aceuil</a>
            <a href="#biens">Biens</a>
            <a href="#propos">A propos</a>
            <a href="#contact">Contact</a>

            @auth
            <a class="text-orange-500" href="{{ route('dashboard') }}">Dashboard</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-red-500">Logout</button>
            </form>
            @else
            <a class="text-orange-500" href="{{ route('login') }}">Login</a>
            @endauth

            <span>
                <button onclick="toggleDark()">🌙</button>
            </span>

        </div>
    </nav>

    @yield('content')







    <script>

        /* DARK MODE */
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');

        }
        function toggleDark() {
            document.documentElement.classList.toggle('dark');
            localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';

        }

        /* MOBILE MENU */
        function toggleMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }

        /* FAVORIS */
        async function toggleFav(id, btn) {
            let res = await fetch(`/favoris/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            });

            if (res.ok) {
                btn.classList.toggle("text-red-500");
                showToast("Ajouté aux favoris ❤️");
            }
        }

        /* MODAL */
        function openVisitModal() {
            document.getElementById('visitModal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('visitModal').classList.add('hidden');
            showToast("Demande envoyée ✅");
        }

        /* TOAST */
        function showToast(msg) {
            let toast = document.getElementById("toast");
            toast.innerText = msg;
            toast.classList.remove("hidden");

            setTimeout(() => {
                toast.classList.add("hidden");
            }, 2000);
        }

        
   
    </script>

    @yield('js')
</body>

</html>