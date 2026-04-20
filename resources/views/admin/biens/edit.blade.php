<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Modifier un bien</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
  body { font-family: Inter, sans-serif; }
</style>
</head>

<body class="bg-slate-100 text-slate-800">

<!-- HEADER -->
<header class="bg-gradient-to-r from-blue-950 via-blue-900 to-cyan-800 text-white">
  <div class="max-w-4xl mx-auto px-6 py-5">
    <h1 class="text-lg font-semibold">Modifier le bien</h1>
    <p class="text-sm text-white/70">Mise à jour des informations immobilières</p>
  </div>
</header>

<!-- FORM -->
<section class="max-w-4xl mx-auto px-6 py-8">

  <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 space-y-5">

    <!-- TITRE -->
    <div>
      <label class="text-sm text-slate-600">Titre</label>
      <input value="Villa moderne haut standing"
        class="mt-1 w-full border rounded-xl p-3 focus:ring-4 focus:ring-blue-100 outline-none">
    </div>

    <!-- TYPE + STATUT -->
    <div class="grid grid-cols-2 gap-4">

      <div>
        <label class="text-sm text-slate-600">Type</label>
        <select class="mt-1 w-full border rounded-xl p-3">
          <option selected>Maison</option>
          <option>Appartement</option>
          <option>Terrain</option>
          <option>Bureau</option>
        </select>
      </div>

      <div>
        <label class="text-sm text-slate-600">Statut</label>
        <select class="mt-1 w-full border rounded-xl p-3">
          <option selected>Disponible</option>
          <option>Loué</option>
          <option>Vendu</option>
        </select>
      </div>

    </div>

    <!-- ADRESSE -->
    <div>
      <label class="text-sm text-slate-600">Adresse</label>
      <input value="Quartier administratif"
        class="mt-1 w-full border rounded-xl p-3">
    </div>

    <!-- VILLE / PAYS -->
    <div class="grid grid-cols-2 gap-4">
      <input value="Lomé" class="border rounded-xl p-3">
      <input value="Togo" class="border rounded-xl p-3">
    </div>

    <!-- PRIX -->
    <div>
      <label class="text-sm text-slate-600">Prix</label>
      <input value="120 000 000 FCFA"
        class="mt-1 w-full border rounded-xl p-3">
    </div>

    <!-- DESCRIPTION -->
    <div>
      <label class="text-sm text-slate-600">Description</label>
      <textarea rows="3"
        class="mt-1 w-full border rounded-xl p-3">Belle villa moderne avec finition haut standing.</textarea>
    </div>

    <!-- IMAGES -->
    <div class="border border-dashed border-slate-300 rounded-xl p-5 bg-slate-50">

      <div class="flex justify-between items-center">
        <p class="text-sm font-medium text-slate-700">Images</p>
        <span class="text-xs text-slate-400">Ajouter ou remplacer</span>
      </div>

      <input type="file" multiple accept="image/*"
        class="mt-3 text-sm w-full">

    </div>

    <!-- ACTIONS -->
    <div class="flex gap-3 pt-2">

      <button class="flex-1 bg-blue-900 hover:bg-blue-800 text-white py-3 rounded-xl font-semibold">
        Enregistrer les modifications
      </button>

      <button class="px-5 bg-slate-100 hover:bg-slate-200 rounded-xl font-medium">
        Annuler
      </button>

    </div>

  </div>

</section>

</body>
</html>