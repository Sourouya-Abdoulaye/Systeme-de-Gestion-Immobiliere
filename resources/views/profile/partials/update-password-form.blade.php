<section class="space-y-6 text-slate-900 dark:text-white">

    <header>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">
            Modifier le mot de passe
        </h2>

        <p class="mt-1 text-sm text-slate-700 dark:text-slate-300">
            Utilisez un mot de passe fort pour sécuriser votre compte.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <!-- CURRENT PASSWORD -->
        <div>
            <label class="text-sm font-medium text-slate-800 dark:text-slate-200">
                Mot de passe actuel
            </label>

            <input type="password"
                   name="current_password"
                   autocomplete="current-password"
                   class="w-full mt-2 p-3 rounded-xl
                          bg-white dark:bg-slate-950
                          border border-slate-300 dark:border-slate-700
                          text-slate-900 dark:text-white
                          placeholder-slate-400
                          focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 outline-none">

            @error('current_password', 'updatePassword')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- NEW PASSWORD -->
        <div>
            <label class="text-sm font-medium text-slate-800 dark:text-slate-200">
                Nouveau mot de passe
            </label>

            <input type="password"
                   name="password"
                   autocomplete="new-password"
                   class="w-full mt-2 p-3 rounded-xl
                          bg-white dark:bg-slate-950
                          border border-slate-300 dark:border-slate-700
                          text-slate-900 dark:text-white
                          placeholder-slate-400
                          focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 outline-none">

            @error('password', 'updatePassword')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- CONFIRM -->
        <div>
            <label class="text-sm font-medium text-slate-800 dark:text-slate-200">
                Confirmation
            </label>

            <input type="password"
                   name="password_confirmation"
                   autocomplete="new-password"
                   class="w-full mt-2 p-3 rounded-xl
                          bg-white dark:bg-slate-950
                          border border-slate-300 dark:border-slate-700
                          text-slate-900 dark:text-white
                          placeholder-slate-400
                          focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 outline-none">

            @error('password_confirmation', 'updatePassword')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- ACTIONS -->
        <div class="flex items-center gap-4">

            <button type="submit"
                    class="px-5 py-2 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold transition">
                Enregistrer
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-green-400 text-sm font-medium">
                    Mot de passe mis à jour.
                </p>
            @endif

        </div>

    </form>

</section>