<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation mot de passe</title>

    <script src="https://cdn.tailwindcss.com"></script>
 @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        tailwind.config = { darkMode: 'class' };

        function applyTheme() {
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        applyTheme();
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-slate-100 dark:bg-slate-950">

<div class="w-full max-w-md p-6">

    <div class="rounded-2xl p-6 md:p-10 shadow-xl
                bg-white dark:bg-slate-900
                border border-slate-200 dark:border-slate-700
                text-slate-900 dark:text-white">

        <!-- INFO TEXT -->
        <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
            Cette zone est sécurisée. Veuillez confirmer votre mot de passe avant de continuer.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <!-- PASSWORD -->
            <div>
                <label class="text-sm text-slate-600 dark:text-slate-300">Mot de passe</label>
                <input type="password" name="password"
                       required autocomplete="current-password"
                       class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white
                              focus:ring-2 focus:ring-cyan-500 outline-none">

                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold transition">
                Confirmer
            </button>

        </form>

    </div>

</div>

</body>
</html>