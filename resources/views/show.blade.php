@extends('base')

@section('titre','Detail du bien')

@section('content')
<style>
    .fade {
        transition: .4s;
    }

    .thumb {
        opacity: .6;
        cursor: pointer
    }

    .thumb:hover {
        opacity: 1
    }

    .active-thumb {
        border: 2px solid orange;
        opacity: 1
    }

    .zoom:hover img {
        transform: scale(1.4)
    }

    .zoom img {
        transition: .3s
    }
</style>


<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">

        <!-- HEADER -->
        <div class="flex justify-between p-4 bg-gray-50 dark:bg-gray-700 border-b">
            <span class="bg-orange-500 text-white px-3 py-1 rounded-full">
                {{ $bien->statut }}
            </span>

            <button onclick="toggleFav()" id="favBtn" class="text-gray-400 text-xl">
                ❤️
            </button>
        </div>

        <!-- MAIN -->
        <div class="grid md:grid-cols-2 gap-8 p-6" id="biens">

            <!-- GALLERY -->
            <div>

                <div class="zoom h-[450px] bg-black rounded-xl overflow-hidden relative">
                    @foreach($bien->images as $i => $img)
                    <img src="{{ asset('storage/'.$img->url) }}"
                        class="main-img absolute w-full h-full object-cover fade {{ $i==0?'opacity-100':'opacity-0' }}">
                    @endforeach
                </div>

                <div class="flex gap-2 mt-3 overflow-x-auto">
                    @foreach($bien->images as $i => $img)
                    <img src="{{ asset('storage/'.$img->url) }}" onclick="setImage({{ $i }})"
                        class="thumb w-20 h-20 rounded-lg object-cover">
                    @endforeach
                </div>

            </div>

            <!-- INFO -->
            <div>

                <h1 class="text-3xl font-bold">{{ $bien->titre }}</h1>

                <p class="text-3xl text-orange-500 font-extrabold mt-2">
                    {{ number_format($bien->prix, 0, ',', ' ') }} FCFA
                </p>

                <div class="grid grid-cols-2 gap-3 mt-6">
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded">Type: {{ $bien->type }}</div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded">Ville: {{ $bien->ville }}</div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded">Pays: {{ $bien->pays }}</div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded">Adresse: {{ $bien->adresse }}</div>
                </div>

                <div class="mt-6">
                    <h2 class="font-semibold text-lg">Description</h2>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $bien->description }}</p>
                </div>

                <div class="mt-6 p-4 border dark:border-gray-700 rounded-xl">
                    <p class="font-semibold">Agence immobilière</p>
                    <p class="text-sm text-gray-500">✔ Vérifié • Réponse rapide</p>

                    <button onclick="openChat()" class="mt-3 w-full bg-gray-800 text-white py-2 rounded-lg">
                        💬 Discuter avec le vendeur
                    </button>
                </div>

                <div class="mt-6 space-y-3">

                    <a href="https://wa.me/22890000000?text=Bonjour, je suis intéressé par {{ $bien->titre }}"
                        class="block text-center bg-green-500 text-white py-3 rounded-xl">
                        WhatsApp
                    </a>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl">
                        Demander visite
                    </button>

                </div>

            </div>
        </div>

        <!-- MAP -->
        <div class="p-6 border-t dark:border-gray-700">
            <h2 class="text-xl font-semibold mb-3">Localisation</h2>

            <iframe class="w-full h-[300px] rounded-xl"
                src="https://maps.google.com/maps?q={{ $bien->ville }}&output=embed">
            </iframe>
        </div>

        <!-- SIMILAIRES -->
        <div class="p-6 border-t dark:border-gray-700">
            <h2 class="text-xl font-semibold mb-4">Biens similaires</h2>

            <div class="grid md:grid-cols-3 gap-4">

                @foreach($similaires as $item)
                <div class="bg-gray-100 dark:bg-gray-700 rounded-xl p-3">

                    <div class="h-32 rounded mb-2 overflow-hidden">
                        <img src="{{ asset('storage/'.$item->images->first()->url ?? '') }}"
                            class="w-full h-full object-cover">
                    </div>

                    <p class="font-semibold">{{ $item->titre }}</p>
                    <p class="text-orange-500">{{ $item->prix }} FCFA</p>

                </div>
                @endforeach

            </div>
        </div>

    </div>
</div>

<!-- CHAT MODAL -->
<div id="chatBox" class="hidden fixed bottom-4 right-4 w-80 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-4">

    <h3 class="font-semibold mb-2">Chat vendeur</h3>

    <div class="h-40 overflow-y-auto bg-gray-100 dark:bg-gray-700 p-2 rounded mb-2 text-sm">
        <p>Bonjour 👋</p>
    </div>

    <input type="text" placeholder="Écrire..." class="w-full border rounded px-2 py-1 dark:bg-gray-700">

</div>


@endsection


@section('js')
<script>
    /* TON JS ORIGINAL */
    let images = document.querySelectorAll(".main-img");
    let thumbs = document.querySelectorAll(".thumb");
    let current = 0;

    function show(i) {
        images.forEach((img, index) => {
            img.style.opacity = index === i ? "1" : "0";
        });

        thumbs.forEach((t, index) => {
            t.classList.toggle("active-thumb", index === i);
        });

        current = i;
    }

    function setImage(i) { show(i); }
    show(0);

    function toggleFav() {
        let btn = document.getElementById("favBtn");
        btn.classList.toggle("text-red-500");
    }

    function openChat() {
        document.getElementById("chatBox").classList.toggle("hidden");
    }

    let startX = 0;

    document.addEventListener("touchstart", e => {
        startX = e.touches[0].clientX;
    });

    document.addEventListener("touchend", e => {
        let endX = e.changedTouches[0].clientX;

        if (startX - endX > 50) show((current + 1) % images.length);
        if (endX - startX > 50) show((current - 1 + images.length) % images.length);
    });
</script>
@endsection