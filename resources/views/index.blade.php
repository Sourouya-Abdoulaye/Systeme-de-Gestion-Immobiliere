<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>Portail Immobilier National</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  body { font-family: Inter, sans-serif; }
</style>
</head>

<body class="bg-slate-50 text-slate-800">

<!-- HEADER -->
<header class="bg-gradient-to-r from-blue-950 via-blue-900 to-cyan-900 text-white">

  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded bg-cyan-400"></div>
      <h1 class="font-semibold text-sm sm:text-lg tracking-tight">
        Agence Immobilière Nationale
      </h1>
    </div>

    <nav class="hidden md:flex gap-8 text-sm text-blue-100">
      <a class="hover:text-white" href="#">Accueil</a>
      <a class="hover:text-white" href="#">Biens</a>
      <a class="hover:text-white" href="#">Services</a>
      <a class="hover:text-white" href="#">Contact</a>
      <a class="hover:text-white" href="{{route('dashboard')}}">Dasboard</a>
	  <a class="hover:text-white" href="/login">Se connecter</a>
    </nav>

    <button onclick="toggleMenu()" class="md:hidden text-2xl">☰</button>

  </div>

  <!-- MOBILE MENU -->
  <div id="mobileMenu" class="hidden md:hidden bg-blue-950 border-t border-blue-800">
    <div class="flex flex-col px-4 py-3 text-sm text-blue-100">
      <a class="py-3 border-b border-blue-800">Accueil</a>
      <a class="py-3 border-b border-blue-800">Biens</a>
      <a class="py-3 border-b border-blue-800">Services</a>
      <a class="py-3">Contact</a>
	  <a class="hover:text-white" href="/login">Se connecter</a>
    </div>
  </div>

</header>

<!-- HERO -->
<section class="relative bg-gradient-to-b from-blue-50 to-white">

  <div class="max-w-7xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-10 items-center">

    <div>

      <div class="inline-block px-3 py-1 text-xs bg-cyan-100 text-cyan-800 rounded-full mb-4">
        Portail officiel sécurisé
      </div>

      <h2 class="text-3xl sm:text-5xl font-semibold leading-tight text-blue-950">
        Accès intelligent et sécurisé au logement national
      </h2>

      <p class="mt-4 text-slate-600 leading-7 text-sm sm:text-base">
        Plateforme moderne de gestion immobilière de l’État, offrant transparence,
        performance et accessibilité à tous les citoyens.
      </p>

      <button class="mt-6 bg-blue-900 hover:bg-blue-800 text-white px-6 py-3 rounded-xl shadow-md">
        Explorer les biens
      </button>

    </div>

    <!-- IMAGE CARD -->
    <div class="relative">
      <img
        src="https://images.unsplash.com/photo-1560518883-ce09059eeffa"
        class="rounded-2xl shadow-2xl"
      />

      <div class="absolute -bottom-6 -left-6 bg-white shadow-lg rounded-xl p-4 w-40">
        <p class="text-blue-900 font-semibold text-lg">1 250+</p>
        <p class="text-xs text-slate-500">Biens actifs</p>
      </div>

    </div>

  </div>

</section>

<!-- STATS -->
<section class="max-w-7xl mx-auto px-4 py-12">

  <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-cyan-500">
      <p class="text-2xl font-semibold text-blue-950">1 250+</p>
      <p class="text-slate-500 text-sm">Biens enregistrés</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-blue-600">
      <p class="text-2xl font-semibold text-blue-950">320+</p>
      <p class="text-slate-500 text-sm">Transactions réalisées</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-cyan-500">
      <p class="text-2xl font-semibold text-blue-950">15</p>
      <p class="text-slate-500 text-sm">Régions couvertes</p>
    </div>

  </div>

</section>

<!-- SECTION TITLE -->
<section class="max-w-7xl mx-auto px-4">
  <h3 class="text-2xl font-semibold text-blue-950">
    Biens disponibles
  </h3>
</section>

<!-- PROPERTIES -->
<section class="max-w-7xl mx-auto px-4 py-8">

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <div class="bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">

      <img
        src="https://images.unsplash.com/photo-1570129477492-45c003edd2be"
        class="h-48 w-full object-cover"
      />

      <div class="p-5">

        <h4 class="font-semibold text-blue-950">Villa moderne</h4>
        <p class="text-sm text-slate-500 mt-1">Lomé - 3 chambres</p>

        <p class="text-cyan-600 font-semibold mt-3">
          120 000 000 FCFA
        </p>

        <button class="mt-4 w-full bg-blue-900 hover:bg-blue-800 text-white py-2 rounded-xl">
          Détails
        </button>

      </div>

    </div>

  </div>

</section>

<!-- FOOTER -->
<footer class="bg-blue-950 text-blue-200 text-center py-6 text-sm mt-10">
  © 2026 Portail Immobilier National — Tous droits réservés
</footer>

<!-- JS -->
<script>
function toggleMenu() {
  document.getElementById("mobileMenu").classList.toggle("hidden");
}
</script>

</body>
</html>