@extends('base')
  <!-- CONTENT -->

@section('titre','listes des biens')

@section('content')
  <div class="max-w-7xl mx-auto px-4 py-8">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between gap-4 mb-6">

      <h1 class="text-3xl font-bold">
        Biens disponibles
      </h1>

      <!-- SEARCH -->
      <form method="GET" class="flex gap-2">
        <input type="text" name="search" placeholder="Rechercher..."
          class="px-4 py-2 rounded-xl border dark:bg-gray-800 dark:border-gray-700">

        <button class="bg-orange-500 text-white px-4 rounded-xl">
          🔍
        </button>
      </form>

    </div>

    <!-- FILTERS -->
    <form method="GET" class="bg-white dark:bg-gray-800 p-4 rounded-2xl shadow mb-6 grid md:grid-cols-4 gap-4">

      <input type="text" name="ville" placeholder="Ville"
        class="border rounded-lg px-3 py-2 dark:bg-gray-900 dark:border-gray-700">

      <select name="type" class="border rounded-lg px-3 py-2 dark:bg-gray-900 dark:border-gray-700">
        <option value="">Type</option>
        <option>Maison</option>
        <option>Terrain</option>
        <option>Appartement</option>
      </select>

      <input type="number" name="min" placeholder="Prix min"
        class="border rounded-lg px-3 py-2 dark:bg-gray-900 dark:border-gray-700">

      <input type="number" name="max" placeholder="Prix max"
        class="border rounded-lg px-3 py-2 dark:bg-gray-900 dark:border-gray-700">

      <button class="bg-orange-500 text-white py-2 rounded-xl col-span-full md:col-span-1">
        Filtrer
      </button>

    </form>



    <!-- GRID -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

      @foreach($biens as $bien)
      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-xl transition overflow-hidden">

        <!-- IMAGE -->
        <a href="{{ route('biens.show', $bien->id) }}">
          <div class="relative h-48">
            <img src="{{ asset('storage/'.$bien->images->first()->url ?? '') }}" class="w-full h-full object-cover">

            <span class="absolute top-2 left-2 bg-green-500 text-white text-xs px-2 py-1 rounded">
              {{ $bien->statut }}
            </span>

            <button onclick="event.preventDefault(); toggleFav({{ $bien->id }}, this)"
              class="absolute top-2 right-2 bg-white p-2 rounded-full shadow text-gray-400">
              ❤️
            </button>
          </div>
        </a>

        <!-- CONTENT -->
        <div class="p-4">

          <h2 class="font-semibold truncate">{{ $bien->titre }}</h2>

          <p class="text-sm text-gray-500">
            📍 {{ $bien->ville }}
          </p>

          <p class="text-orange-500 font-bold text-lg mt-2">
            {{ number_format($bien->prix, 0, ',', ' ') }} FCFA
          </p>

          <!-- ACTIONS -->
          <div class="mt-3 space-y-2">

            <a href="https://wa.me/{{ $bien->user->phone ?? '22890000000' }}?text=Bonjour, je suis intéressé par {{ urlencode($bien->titre) }}"
              target="_blank" class="block text-center bg-green-500 text-white py-2 rounded-xl">
              WhatsApp
            </a>

            <button onclick="openVisitModal({{ $bien->id }})" class="w-full bg-orange-500 text-white py-2 rounded-xl">
              Visite
            </button>

          </div>

        </div>

      </div>
      @endforeach

    </div>

    <!-- PAGINATION -->
    <div class="mt-8">
      {{ $biens->links() }}
    </div>

  </div>

   <!-- MODAL VISITE -->
  <div id="visitModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">

    <div class="bg-white p-6 rounded-xl w-80">

      <h2 class="text-lg font-semibold mb-3">Demande de visite</h2>

      <input type="date" class="border p-2 w-full mb-3">

      <button onclick="closeModal()" class="bg-orange-500 text-white px-4 py-2 w-full rounded">
        Envoyer
      </button>

    </div>
  </div>

  <!-- TOAST -->
  <div id="toast" class="hidden fixed bottom-5 right-5 bg-black text-white px-4 py-2 rounded">
    Action réussie
  </div>
@endsection
 

 