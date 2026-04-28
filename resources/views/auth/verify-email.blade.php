<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification Email</title>

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

            <!-- MESSAGE -->
            <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
                Merci pour votre inscription. Avant de commencer, veuillez vérifier votre adresse email en cliquant sur
                le lien que nous venons de vous envoyer.
                Si vous ne l’avez pas reçu, nous pouvons vous en renvoyer un autre.
            </p>

            <!-- SUCCESS MESSAGE -->
            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-green-500 text-sm font-medium">
                Un nouveau lien de vérification a été envoyé à votre adresse email.
            </div>
            @endif

            <!-- ACTIONS -->
            <div class="flex flex-col gap-3">

                <!-- RESEND -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold transition">
                        Renvoyer l’email de vérification
                    </button>
                </form>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-red-500 hover:bg-red-400 text-black font-semibold transition">
                        Déconnexion
                    </button>
                </form>

            </div>

        </div>

    </div>

</body>

</html>