<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser mot de passe</title>

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

            <h1 class="text-2xl font-bold text-center mb-6">
                Nouveau mot de passe
            </h1>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <!-- TOKEN -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- EMAIL -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Email</label>
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                        class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white
                              focus:ring-2 focus:ring-cyan-500 outline-none">

                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Mot de passe</label>
                    <input type="password" name="password" required class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white">

                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CONFIRM PASSWORD -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Confirmer mot de passe</label>
                    <input type="password" name="password_confirmation" required class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white">

                    @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold transition">
                    Réinitialiser le mot de passe
                </button>

            </form>

        </div>

    </div>

</body>

</html>