<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>

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

        <!-- TEXT INFO -->
        <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
            Mot de passe oublié ? Aucun problème.
            Entrez votre email et nous vous enverrons un lien de réinitialisation.
        </p>

        <!-- SESSION STATUS -->
        @if (session('status'))
            <div class="mb-4 text-green-500 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-slate-600 dark:text-slate-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       required autofocus
                       class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white
                              focus:ring-2 focus:ring-cyan-500 outline-none">

                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold transition">
                Envoyer le lien
            </button>

        </form>

    </div>

</div>

</body>
</html>