<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

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

        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme',
                document.documentElement.classList.contains('dark') ? 'dark' : 'light'
            );
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-slate-100 dark:bg-slate-950">

    <div class="w-full max-w-lg p-6">

        <div class="rounded-2xl p-6 md:p-10 shadow-xl
                bg-white dark:bg-slate-900
                border border-slate-200 dark:border-slate-700
                text-slate-900 dark:text-white">

            <h1 class="text-2xl font-bold text-center mb-6">Créer un compte</h1>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- NAME -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Nom</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white
                              focus:ring-2 focus:ring-cyan-500 outline-none">

                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ADRESSE -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse') }}" class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white
                              focus:ring-2 focus:ring-cyan-500 outline-none">

                    @error('adresse')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- GENDER -->
                    <div>
                        <label class="text-sm text-slate-600 dark:text-slate-300">Genre</label>
                        <select name="gender" class="w-full mt-2 p-3 rounded-xl
                                   bg-white dark:bg-slate-800
                                   border border-slate-300 dark:border-slate-700
                                   text-slate-900 dark:text-white">

                            <option value="">Choisir</option>
                            <option value="F" {{ old('gender')=='F' ? 'selected' : '' }}>F</option>
                            <option value="M" {{ old('gender')=='M' ? 'selected' : '' }}>M</option>
                        </select>

                        @error('gender')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- PHONE -->
                    <div>
                        <label class="text-sm text-slate-600 dark:text-slate-300">Téléphone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full mt-2 p-3 rounded-xl
                                  bg-white dark:bg-slate-800
                                  border border-slate-300 dark:border-slate-700
                                  text-slate-900 dark:text-white">

                        @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- ROLE -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Rôle</label>
                    <select name="role" class="w-full mt-2 p-3 rounded-xl
                               bg-white dark:bg-slate-800
                               border border-slate-300 dark:border-slate-700
                               text-slate-900 dark:text-white">

                        <option value="">Choisir</option>
                        <option value="admin">Admin</option>
                        <option value="agent">Agent</option>
                        <option value="proprietaire">Propriétaire</option>
                        <option value="locataire">Locataire</option>
                    </select>

                    @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white">

                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Mot de passe</label>
                    <input type="password" name="password" class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white">

                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CONFIRM -->
                <div>
                    <label class="text-sm text-slate-600 dark:text-slate-300">Confirmation</label>
                    <input type="password" name="password_confirmation" class="w-full mt-2 p-3 rounded-xl
                              bg-white dark:bg-slate-800
                              border border-slate-300 dark:border-slate-700
                              text-slate-900 dark:text-white">
                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold">
                    S’inscrire
                </button>

            </form>

            <div class="text-center mt-4 text-sm">
                <a href="{{ route('login') }}" class="text-cyan-500 hover:underline">
                    Déjà un compte ?
                </a>
            </div>

            <div class="text-center mt-3">
                <button onclick="toggleTheme()" class="text-sm text-slate-500 dark:text-slate-300 hover:underline">
                    Mode clair / sombre
                </button>
            </div>

        </div>

    </div>

</body>

</html>