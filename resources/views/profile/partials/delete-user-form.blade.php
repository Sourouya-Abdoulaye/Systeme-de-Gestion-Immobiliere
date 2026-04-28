<section class="space-y-6 text-slate-900 dark:text-white">

    <!-- HEADER -->
    <header>
        <h2 class="text-lg font-semibold">
            Supprimer le compte
        </h2>

        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
            Une fois supprimé, toutes vos données seront définitivement effacées.
            Sauvegardez ce que vous voulez garder avant de continuer.
        </p>
    </header>

    <!-- OPEN MODAL BUTTON -->
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-500 text-white font-semibold transition">
        Supprimer le compte
    </button>

    <!-- MODAL (BACKEND INTACT) -->
    <div
        x-data="{ open: false }"
        x-show="open"
        x-on:open-modal.window="open = ($event.detail == 'confirm-user-deletion')"
        x-on:close.window="open = false"
        class="fixed inset-0 flex items-center justify-center bg-black/60"
        style="display: none;">

        <div class="w-full max-w-lg bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-xl border border-slate-200 dark:border-slate-700">

            <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-5">
                @csrf
                @method('delete')

                <!-- TITLE -->
                <h2 class="text-lg font-semibold">
                    Êtes-vous sûr de vouloir supprimer votre compte ?
                </h2>

                <p class="text-sm text-slate-600 dark:text-slate-300">
                    Cette action est irréversible. Entrez votre mot de passe pour confirmer.
                </p>

                <!-- PASSWORD -->
                <div>
                    <input id="password"
                           name="password"
                           type="password"
                           placeholder="Mot de passe"
                           class="w-full mt-2 p-3 rounded-xl
                                  bg-white dark:bg-slate-800
                                  border border-slate-300 dark:border-slate-700
                                  text-slate-900 dark:text-white
                                  focus:ring-2 focus:ring-red-500 outline-none">

                    @error('password', 'userDeletion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ACTIONS -->
                <div class="flex justify-end gap-3">

                    <!-- CANCEL -->
                    <button type="button"
                            x-on:click="$dispatch('close')"
                            class="px-4 py-2 rounded-xl bg-gray-300 dark:bg-slate-700 text-black dark:text-white">
                        Annuler
                    </button>

                    <!-- DELETE -->
                    <button type="submit"
                            class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-500 text-white font-semibold">
                        Supprimer
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>