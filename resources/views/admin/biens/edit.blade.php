@extends('dashboard')

@section('titre','Modifier un bien')

@section('content')

<div class="max-w-xl mx-auto px-4 py-10">

  <div class="rounded-2xl p-6 md:p-10 shadow-xl
              bg-white dark:bg-slate-900
              border border-slate-300 dark:border-slate-700
              text-slate-900 dark:text-white">

    <form action="{{ route('admin.biens.update', $bien->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- TITRE -->
      <div>
        <label class="text-sm text-slate-600 dark:text-slate-300">Titre du bien</label>
        <input name="titre"
               value="{{ old('titre', $bien->titre) }}"
               class="w-full mt-2 p-3 rounded-xl
                      bg-white dark:bg-slate-800
                      text-slate-900 dark:text-white
                      border border-slate-300 dark:border-slate-700
                      focus:ring-2 focus:ring-cyan-500 outline-none"
               placeholder="Villa moderne haut standing">

        @error('titre')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- GRID -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <!-- TYPE -->
        <div>
          <label class="text-sm text-slate-600 dark:text-slate-300">Type</label>
          <select name="type"
                  class="w-full mt-2 p-3 rounded-xl
                         bg-white dark:bg-slate-800
                         text-slate-900 dark:text-white
                         border border-slate-300 dark:border-slate-700">

            <option value="maison" {{ $bien->type == 'maison' ? 'selected' : '' }}>Maison</option>
            <option value="appartement" {{ $bien->type == 'appartement' ? 'selected' : '' }}>Appartement</option>
            <option value="terrain" {{ $bien->type == 'terrain' ? 'selected' : '' }}>Terrain</option>
            <option value="bureau" {{ $bien->type == 'bureau' ? 'selected' : '' }}>Bureau</option>

          </select>

          @error('type')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- STATUT -->
        <div>
          <label class="text-sm text-slate-600 dark:text-slate-300">Statut</label>
          <select name="statut"
                  class="w-full mt-2 p-3 rounded-xl
                         bg-white dark:bg-slate-800
                         text-slate-900 dark:text-white
                         border border-slate-300 dark:border-slate-700">

            <option value="disponible" {{ $bien->statut == 'disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="brouillon" {{ $bien->statut == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
            <option value="vendu" {{ $bien->statut == 'vendu' ? 'selected' : '' }}>Vendu</option>
            <option value="loue" {{ $bien->statut == 'loue' ? 'selected' : '' }}>Loué</option>

          </select>

          @error('statut')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

      </div>

      <!-- ADRESSE -->
      <div>
        <label class="text-sm text-slate-600 dark:text-slate-300">Adresse</label>
        <input name="adresse"
               value="{{ old('adresse', $bien->adresse) }}"
               class="w-full mt-2 p-3 rounded-xl
                      bg-white dark:bg-slate-800
                      text-slate-900 dark:text-white
                      border border-slate-300 dark:border-slate-700">
      </div>

      <!-- VILLE / PAYS -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <input name="ville"
               value="{{ old('ville', $bien->ville) }}"
               class="w-full p-3 rounded-xl
                      bg-white dark:bg-slate-800
                      text-slate-900 dark:text-white
                      border border-slate-300 dark:border-slate-700"
               placeholder="Ville">

        <input name="pays"
               value="{{ old('pays', $bien->pays) }}"
               class="w-full p-3 rounded-xl
                      bg-white dark:bg-slate-800
                      text-slate-900 dark:text-white
                      border border-slate-300 dark:border-slate-700"
               placeholder="Pays">

      </div>

      <!-- PRIX -->
      <div>
        <label class="text-sm text-slate-600 dark:text-slate-300">Prix</label>
        <input name="prix"
               value="{{ old('prix', $bien->prix) }}"
               class="w-full mt-2 p-3 rounded-xl
                      bg-white dark:bg-slate-800
                      text-slate-900 dark:text-white
                      border border-slate-300 dark:border-slate-700">
      </div>

      <!-- DESCRIPTION -->
      <div>
        <label class="text-sm text-slate-600 dark:text-slate-300">Description</label>
        <textarea name="description" rows="4"
                  class="w-full mt-2 p-3 rounded-xl
                         bg-white dark:bg-slate-800
                         text-slate-900 dark:text-white
                         border border-slate-300 dark:border-slate-700">{{ old('description', $bien->description) }}</textarea>
      </div>

      <!-- IMAGES -->
      <div class="border border-dashed border-slate-300 dark:border-slate-700
                  rounded-xl p-5 text-center
                  bg-slate-50 dark:bg-slate-800">

        <p class="text-slate-600 dark:text-slate-300 text-sm">
          Images du bien (ajouter ou remplacer)
        </p>

        <input type="file" name="images[]" multiple
               class="mt-3 w-full text-sm text-slate-900 dark:text-white">

      </div>

      <!-- BUTTON -->
      <button type="submit"
              class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400
                     text-black font-semibold transition">
        Mettre à jour le bien
      </button>

    </form>

  </div>
</div>

@endsection