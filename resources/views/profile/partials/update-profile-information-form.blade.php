<section class="space-y-6 text-slate-900 dark:text-white">

    <!-- HEADER -->
    <header>
        <h2 class="text-lg font-semibold">
            Informations du profil
        </h2>

        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
            Mettez à jour vos informations personnelles et votre adresse email.
        </p>
    </header>

    <!-- FORM VERIFICATION (BACKEND INTACT) -->
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- FORM UPDATE -->
    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <!-- NAME -->
        <div>
            <label class="text-sm text-slate-700 dark:text-slate-300">
                Nom
            </label>

            <input id="name"
                   name="name"
                   type="text"
                   value="{{ old('name', $user->name) }}"
                   required autofocus
                   autocomplete="name"
                   class="w-full mt-2 p-3 rounded-xl
                          bg-white dark:bg-slate-800
                          border border-slate-300 dark:border-slate-700
                          text-slate-900 dark:text-white
                          focus:ring-2 focus:ring-cyan-500 outline-none">

            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- EMAIL -->
        <div>
            <label class="text-sm text-slate-700 dark:text-slate-300">
                Email
            </label>

            <input id="email"
                   name="email"
                   type="email"
                   value="{{ old('email', $user->email) }}"
                   required
                   autocomplete="username"
                   class="w-full mt-2 p-3 rounded-xl
                          bg-white dark:bg-slate-800
                          border border-slate-300 dark:border-slate-700
                          text-slate-900 dark:text-white
                          focus:ring-2 focus:ring-cyan-500 outline-none">

            @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <!-- EMAIL NOT VERIFIED -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 text-sm text-slate-700 dark:text-slate-300">

                    <p class="mb-2 text-red-500">
                        Votre email n’est pas vérifié.
                    </p>

                    <button form="send-verification"
                            class="underline text-sm text-cyan-600 hover:text-cyan-400">
                        Renvoyer l’email de vérification
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-green-500 font-medium">
                            Un nouveau lien de vérification a été envoyé.
                        </p>
                    @endif

                </div>
            @endif
        </div>

        <!-- ACTIONS -->
        <div class="flex items-center gap-4">

            <button type="submit"
                    class="px-5 py-2 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold transition">
                Enregistrer
            </button>

            <!-- STATUS -->
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-green-500 text-sm">
                    Sauvegardé.
                </p>
            @endif

        </div>

    </form>

</section>