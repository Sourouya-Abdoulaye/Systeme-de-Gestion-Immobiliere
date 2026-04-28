<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
     @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- IMPORTANT : activer dark mode -->
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <script>
        // Appliquer le thème au chargement
        function applyTheme() {
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        applyTheme();

        // Toggle theme
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>

</head>

<body class="h-full bg-slate-100 dark:bg-slate-950 flex items-center justify-center">

<!-- CARD -->
<div class="w-full max-w-md p-6">

    <div class="rounded-2xl p-6 md:p-10 shadow-xl
                bg-white dark:bg-slate-900
                border border-slate-200 dark:border-slate-700
                text-slate-900 dark:text-white">

        <!-- TITLE -->
        <h1 class="text-2xl font-bold text-center mb-6">
            Connexion
        </h1>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-slate-600 dark:text-slate-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       required autofocus
                       class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              text-slate-900 dark:text-white
                              border border-slate-300 dark:border-slate-700
                              focus:ring-2 focus:ring-cyan-500 outline-none"
                       placeholder="exemple@mail.com">

                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="text-sm text-slate-600 dark:text-slate-300">Mot de passe</label>
                <input type="password" name="password"
                       required
                       class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              text-slate-900 dark:text-white
                              border border-slate-300 dark:border-slate-700
                              focus:ring-2 focus:ring-cyan-500 outline-none"
                       placeholder="••••••••">

                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- OPTIONS -->
            <div class="flex items-center justify-between text-sm">

                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember"
                           class="rounded border-slate-300 dark:border-slate-600 text-cyan-500">
                    <span class="text-slate-600 dark:text-slate-300">
                        Se souvenir de moi
                    </span>
                </label>

                <a href="/register" class="text-cyan-500 hover:underline">
                    S’inscrire
                </a>

            </div>

            <!-- FORGOT PASSWORD -->
            <div class="text-center">
                <a href="{{ route('password.request') }}"
                   class="text-sm text-slate-500 dark:text-slate-400 hover:underline">
                    Mot de passe oublié ?
                </a>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400
                           text-black font-semibold transition">
                Se connecter
            </button>

        </form>

        <!-- TOGGLE DARK MODE -->
        <div class="text-center mt-6">
            <button onclick="toggleTheme()"
                    class="text-sm text-slate-500 dark:text-slate-300 hover:underline">
                Changer mode clair/sombre
            </button>
        </div>

    </div>

</div>

</body>
</html>