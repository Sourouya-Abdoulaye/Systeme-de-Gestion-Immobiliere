<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un bien</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <!-- TAILWIND DARK MODE -->
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>

  <!-- <style>
    body {
      font-family: Inter, sans-serif;
    }

    /* INPUT DARK */
    .input {
      background: #0b1220;
      border: 1px solid rgba(255, 255, 255, 0.08);
      color: white;
    }

    .dark .input {
      background: white;
      color: #0f172a;
      border: 1px solid #cbd5e1;
    }

    .error {
      color: #fb7185;
      font-size: 12px;
      margin-top: 6px;
    }
  </style> -->
</head>

<!-- BODY -->

<body class="bg-[#0b1220] text-white dark:bg-slate-100 dark:text-slate-900 transition" id="app">

  <header class="border-b border-white/10 dark:border-slate-200 bg-[#0b1220] dark:bg-white">
    <div class="max-w-5xl mx-auto px-6 py-6 flex justify-between items-center">

      <div>
        <h1 class="text-xl font-semibold">Ajouter un bien immobilier</h1>
        <p class="text-sm text-white/50 dark:text-slate-500">Dashboard SaaS immobilier</p>
      </div>

      <!-- THEME BUTTON -->
      <button onclick="toggleTheme()"
        class="px-3 py-2 rounded-xl bg-white/10 dark:bg-slate-200 hover:opacity-80 text-sm transition">
         ☀️
      </button>

    </div>
  </header>

  <!-- FORM -->
  <div class="max-w-3xl mx-auto px-4 py-10">

    <div class="rounded-2xl p-6 md:p-10 shadow-xl bg-[#0f172a] dark:bg-white dark:shadow-lg">

      <form action="{{route('admin.biens.store')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- TITRE -->
        <div>
          <label class="text-sm text-white/60 dark:text-slate-600">Titre du bien</label>
          <input name="titre" value="{{ old('titre') }}" class="input w-full mt-2 p-3 rounded-xl"
            placeholder="Villa moderne haut standing">

          @error('titre')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

          <!-- TYPE -->
          <div>
            <label class="text-sm text-white/60 dark:text-slate-600">Type</label>
            <select name="type" class="input w-full mt-2 p-3 rounded-xl">
              <option value="">-- choisir --</option>
              <option value="maison" {{ old('type')=='maison' ? 'selected' : '' }}>Maison</option>
              <option value="appartement" {{ old('type')=='appartement' ? 'selected' : '' }}>Appartement</option>
              <option value="terrain" {{ old('type')=='terrain' ? 'selected' : '' }}>Terrain</option>
              <option value="bureau" {{ old('type')=='bureau' ? 'selected' : '' }}>Bureau</option>
            </select>

            @error('type')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>

          <!-- STATUT -->
          <div>
            <label class="text-sm text-white/60 dark:text-slate-600">Statut</label>
            <select name="statut" class="input w-full mt-2 p-3 rounded-xl">
              <option value="disponible" {{ old('statut')=='disponible' ? 'selected' : '' }}>Disponible</option>
              <option value="brouillon" {{ old('statut')=='brouillon' ? 'selected' : '' }}>Brouillon</option>
              <option value="vendu" {{ old('statut')=='vendu' ? 'selected' : '' }}>Vendu</option>
              <option value="loue" {{ old('statut')=='loue' ? 'selected' : '' }}>Loué</option>
            </select>

            @error('statut')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>

        </div>

        <!-- ADRESSE -->
        <div>
          <label class="text-sm text-white/60 dark:text-slate-600">Adresse</label>
          <input name="adresse" value="{{ old('adresse') }}" class="input w-full mt-2 p-3 rounded-xl"
            placeholder="Quartier / Rue">

          @error('adresse')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- VILLE / PAYS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

          <div>
            <input name="ville" value="{{ old('ville') }}" class="input w-full p-3 rounded-xl" placeholder="Ville">

            @error('ville')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <input name="pays" value="{{ old('pays') }}" class="input w-full p-3 rounded-xl" placeholder="Pays">

            @error('pays')
            <p class="error">{{ $message }}</p>
            @enderror
          </div>

        </div>

        <!-- PRIX -->
        <div>
          <label class="text-sm text-white/60 dark:text-slate-600">Prix</label>
          <input name="prix" value="{{ old('prix') }}" class="input w-full mt-2 p-3 rounded-xl"
            placeholder="120 000 000 FCFA">

          @error('prix')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- DESCRIPTION -->
        <div>
          <label class="text-sm text-white/60 dark:text-slate-600">Description</label>
          <textarea name="description" rows="4" class="input w-full mt-2 p-3 rounded-xl"
            placeholder="Description du bien...">{{ old('description') }}</textarea>

          @error('description')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- UPLOAD -->
        <div class="border border-dashed border-white/10 dark:border-slate-300 rounded-xl p-5 text-center">
          <p class="text-white/50 dark:text-slate-500 text-sm">Images du bien</p>
          <input type="file" name="images[]" multiple class="mt-3 w-full text-sm">

          @error('images')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- BUTTON -->
        <button type="submit"
          class="w-full py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-semibold transition">
          Créer le bien
        </button>

      </form>

    </div>
  </div>

  <!-- SCRIPT THEME -->
  <script>
    // function toggleTheme(){
    //   document.documentElement.classList.toggle('dark');

    //   if(document.documentElement.classList.contains('dark')){
    //     localStorage.setItem('theme','dark');
    //   }else{
    //     localStorage.setItem('theme','light');
    //   }
    // }

    // if(localStorage.getItem('theme')==='dark'){
    //   document.documentElement.classList.add('dark');
    // }

    /* DARK MODE */
    function toggleTheme() {
      document.documentElement.classList.toggle('dark');

      if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    }

    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
    }
  </script>

</body>

</html>