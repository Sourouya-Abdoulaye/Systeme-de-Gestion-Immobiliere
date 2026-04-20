<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Ajouter un bien</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
  body { font-family: Inter, sans-serif; }
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
<section class="max-w-5xl mx-auto px-6 py-10">

  <div class="bg-white rounded-2xl shadow-lg p-6 space-y-6">

    <!-- TOP GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

      <!-- TITRE -->
      <div class="md:col-span-2">
        <label class="text-sm text-slate-600">Titre du bien</label>
        <input class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none"
          placeholder="Ex : Villa moderne haut standing">
      </div>

      <!-- TYPE -->
      <div>
        <label class="text-sm text-slate-600">Type de bien</label>
        <select class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100">
          <option>Maison</option>
          <option>Appartement</option>
          <option>Terrain</option>
          <option>Bureau</option>
        </select>
      </div>

      <!-- STATUT -->
      <div>
        <label class="text-sm text-slate-600">Statut</label>
        <select class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100">
          <option>Disponible</option>
          <option>Loué</option>
          <option>Vendu</option>
        </select>
      </div>

      <!-- ADRESSE -->
      <div class="md:col-span-2">
        <label class="text-sm text-slate-600">Adresse</label>
        <input class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100"
          placeholder="Quartier / Rue">
      </div>

      <!-- VILLE -->
      <div>
        <label class="text-sm text-slate-600">Ville</label>
        <input class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100"
          placeholder="Lomé">
      </div>

      <!-- PAYS -->
      <div>
        <label class="text-sm text-slate-600">Pays</label>
        <input class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100"
          placeholder="Togo">
      </div>

      <!-- PRIX -->
      <div class="md:col-span-2">
        <label class="text-sm text-slate-600">Prix</label>
        <input class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100"
          placeholder="Ex : 120 000 000 FCFA">
      </div>

      <!-- DESCRIPTION -->
      <div class="md:col-span-2">
        <label class="text-sm text-slate-600">Description</label>
        <textarea rows="4"
          class="mt-1 w-full border border-slate-200 rounded-xl p-3
          focus:ring-4 focus:ring-blue-100"
          placeholder="Description détaillée du bien"></textarea>
      </div>

    </div>

    <!-- IMAGES (position propre séparée) -->
    <div class="border-2 border-dashed border-blue-200 rounded-xl p-6 bg-slate-50">

      <div class="flex items-center justify-between">
        <p class="text-sm font-medium text-slate-700">Images du bien</p>
        <span class="text-xs text-slate-400">JPEG / PNG</span>
      </div>

      <input type="file" multiple accept="image/*"
        class="mt-4 w-full text-sm">

    </div>

    <!-- ACTIONS -->
    <div class="flex gap-4 pt-2">

      <button class="flex-1 bg-gradient-to-r from-blue-900 to-cyan-700 text-white py-3 rounded-xl font-semibold hover:opacity-90 transition">
        Enregistrer
      </button>

      <button class="flex-1 bg-slate-100 hover:bg-slate-200 py-3 rounded-xl font-semibold rounded-xl">
        Annuler
      </button>

    </div>

  </div>

</section>

</body>
</html>