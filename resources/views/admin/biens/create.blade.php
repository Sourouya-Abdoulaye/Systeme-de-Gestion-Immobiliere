<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajouter un bien</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    body {
      font-family: Inter, sans-serif;
    }
  </style>
</head>

<body class="bg-slate-100 text-slate-800">

  <!-- HEADER (respect couleur officielle) -->
  <header class="bg-gradient-to-r from-blue-950 via-blue-900 to-cyan-800 text-white">
    <div class="max-w-5xl mx-auto px-6 py-6">
      <h1 class="text-lg font-semibold">Ajouter un bien immobilier</h1>
      <p class="text-sm text-white/70">Portail national de gestion immobilière</p>
    </div>
  </header>

  <!-- FORM CONTAINER -->
  <section class="w-[500px] max-w-5xl mx-auto px-6 py-10">
    <form action="{{route('admin.bien.store')}}" method="Post" enctype="multipart/form-data">
      <div class="bg-slate-500 rounded-2xl shadow-lg p-6 space-y-6">
        @csrf
        <!-- TOP GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

          <!-- TITRE -->
          <div class="md:col-span-2">
            <label class="text-sm text-slate-600">Titre du bien</label>
            <input class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none"
              placeholder="Ex : Villa moderne haut standing" name="titre" value="{{old('titre')}}">

            @error('Titre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- TYPE -->
          <div>
            <label class="text-sm text-slate-600">Type de bien</label>
            <select name="type" class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100">
              <option value="Maison">Maison</option>
              <option value="Appartement">Appartement</option>
              <option value="Terrain">Terrain</option>
              <option value="Bureau">Bureau</option>
            </select>
            @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- STATUT -->
          <div>
            <label lass="text-sm text-slate-600">Statut</label>
            <select name="statut" na class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100">
              <option>Disponible</option>
              <option>Loué</option>
              <option>Vendu</option>
            </select>
            @error('statut')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- ADRESSE -->
          <div class="md:col-span-2">
            <label class="text-sm text-slate-600">Adresse</label>
            <input name="adresse" class="mt-1 w-full border border-slate-200 rounded-xl p-3
                    focus:ring-4 focus:ring-blue-100" placeholder="Quartier / Rue">
            @error('adresse')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- VILLE -->
          <div>
            <label class="text-sm text-slate-600">Ville</label>
            <input name="ville" class="mt-1 w-full border border-slate-200 rounded-xl p-3
                    focus:ring-4 focus:ring-blue-100" placeholder="Lomé">
            @error('ville')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- PAYS -->
          <div>
            <label class="text-sm text-slate-600">Pays</label>
            <input name="pays" class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100" placeholder="Togo">
            @error('pays')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- PRIX -->
          <div class="md:col-span-2">
            <label class="text-sm text-slate-600">Prix</label>
            <input name="prix" class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100" placeholder="Ex : 120 000 000 FCFA">
            @error('prix')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- DESCRIPTION -->
          <div class="md:col-span-2">
            <label class="text-sm text-slate-600">Description</label>
            <textarea name="Description" rows="4" class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100" placeholder="Description détaillée du bien"></textarea>
            
          </div>

        </div>

        <!-- IMAGES (position propre séparée) -->
        <div class="border-2 border-dashed border-blue-200 rounded-xl p-6 bg-slate-50">

          <div class="flex items-center justify-between">
            <p class="text-xl font-medium text-slate-700">Images du bien</p>
            <span class="text-xs text-slate-400">JPEG / PNG</span>
          </div>

          <input name="images[]" type="file" multiple accept="image/*" class="mt-4 w-full text-sm">

        </div>
        @error('images')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- ACTIONS -->
        <div class="flex gap-4 pt-2">
          <button
            class="flex-1 bg-gradient-to-r from-blue-900 to-cyan-700 text-white py-3 rounded-xl font-semibold hover:opacity-90 transition">
            Enregistrer
          </button>

        </div>

      </div>
    </form>
  </section>

</body>

</html>