@extends('dashboard')

@section('titre','Créer un bien')

@section('content')

<div class="max-w-xl mx-auto px-4 py-10">

  <div class="rounded-2xl p-6 md:p-10 shadow-xl 
              bg-white dark:bg-slate-900 
              border border-slate-300 dark:border-slate-700 
              text-slate-900 dark:text-white">

    <form action="{{ route('admin.biens.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- TITRE -->
      <div>
        <label class="text-sm text-slate-600 dark:text-slate-300">Titre du bien</label>
        <input name="titre" value="{{ old('titre') }}" class="w-full mt-2 p-3 rounded-xl 
                 bg-white dark:bg-slate-800 
                 text-slate-900 dark:text-white 
                 border border-slate-300 dark:border-slate-700 
                 focus:ring-2 focus:ring-cyan-500 outline-none" placeholder="Villa moderne haut standing">

        @error('titre')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- GRID -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <!-- TYPE -->
        <div>
          <label class="text-sm text-slate-600 dark:text-slate-300">Type</label>
          <select name="type" class="w-full mt-2 p-3 rounded-xl 
                   bg-white dark:bg-slate-800 
                   text-slate-900 dark:text-white 
                   border border-slate-300 dark:border-slate-700">

            <option value="">choisir </option>
            <option value="maison" {{old('type') =='maison' ? 'selected':''}}>Maison</option>
            <option value="appartement" {{old('type') =='appartement' ? 'selected':''}}>Appartement</option>
            <option value="terrain" {{old('type') =='terrain' ? 'selected':''}}>Terrain</option>
            <option value="bureau" {{old('type') =='bureau' ? 'selected':''}}>Bureau</option>
          </select>

          @error('type')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- STATUT -->
        <div>
          <label class="text-sm text-slate-600 dark:text-slate-300">Statut</label>
          <select name="statut" class="w-full mt-2 p-3 rounded-xl 
                   bg-white dark:bg-slate-800 
                   text-slate-900 dark:text-white 
                   border border-slate-300 dark:border-slate-700">

            <option value="disponible" {{old('statut') =='disponible' ? 'selected':''}}>Disponible</option>
            <option value="brouillon" {{old('statut') =='brouillon' ? 'selected':''}}>Brouillon</option>
            <option value="vendu" {{old('statut') =='vendu' ? 'selected':''}}>Vendu</option>
            <option value="loue" {{old('statut') =='loue' ? 'selected':''}}>Loué</option>
          </select>

          @error('statut')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

      </div>

      <!-- ADRESSE -->
      <div>
        <label class="text-sm text-slate-600 dark:text-slate-300">Adresse</label>
        <input name="adresse" value="{{ old('adresse') }}" class="w-full mt-2 p-3 rounded-xl 
                 bg-white dark:bg-slate-800 
                 text-slate-900 dark:text-white 
                 border border-slate-300 dark:border-slate-700" placeholder="Quartier / Rue">

        @error('adresse')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

      </div>

      <!-- VILLE / PAYS -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <input name="ville" value="{{ old('ville') }}" class="w-full p-3 rounded-xl 
                 bg-white dark:bg-slate-800 
                 text-slate-900 dark:text-white 
                 border border-slate-300 dark:border-slate-700" placeholder="Ville">
        @error('ville')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div >
      <input name="pays" value="{{ old('pays') }}" class="w-full p-3 rounded-xl 
                 bg-white dark:bg-slate-800 
                 text-slate-900 dark:text-white 
                 border border-slate-300 dark:border-slate-700" placeholder="Pays">

      @error('pays')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
  </div>

  <!-- PRIX -->
  <div>
    <label class="text-sm text-slate-600 dark:text-slate-300">Prix</label>
    <input name="prix" value="{{ old('prix') }}" class="w-full mt-2 p-3 rounded-xl 
                 bg-white dark:bg-slate-800 
                 text-slate-900 dark:text-white 
                 border border-slate-300 dark:border-slate-700" placeholder="120 000 000 FCFA">
    @error('prix')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <!-- DESCRIPTION -->
  <div>
    <label class="text-sm text-slate-600 dark:text-slate-300">Description</label>
    <textarea name="description" rows="4" class="w-full mt-2 p-3 rounded-xl 
                 bg-white dark:bg-slate-800 
                 text-slate-900 dark:text-white 
                 border border-slate-300 dark:border-slate-700"
      placeholder="Description du bien...">{{ old('description') }}</textarea>
  </div>

  <!-- IMAGES -->
  <div class="border border-dashed border-slate-300 dark:border-slate-600 rounded-xl p-5 text-center">
    <p class="text-slate-600 dark:text-slate-300 text-sm">Images du bien</p>
    <input type="file" name="images[]" multiple class="mt-3 w-full text-sm text-slate-900 dark:text-white">
    @error('images')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <!-- BUTTON -->
  <button type="submit"
    class="w-full py-3 rounded-xl bg-green-500 hover:bg-green-600 text-black font-semibold transition">
    Créer le bien
  </button>

  </form>

</div>
</div>

@endsection