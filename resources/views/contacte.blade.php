@extends('base')
@section('titre','contact')

@section('content')
<!-- CONTENT -->
<div class="max-w-6xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-8">📞 Support & Contact</h1>

    <div class="grid md:grid-cols-2 gap-8">

        <!-- FORM -->

        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
            @if(session('success'))
            <div id="succes" class="bg-green-700  text-green-50 p-4 rounded mb-6">
                <script>
                    setTimeout(() => {
                        // por supprimer le message de succes apres 4s
                        document.querySelector('#succes').remove();
                    }, 4000);

                </script>
                {{ session('success') }}
            </div>
            @endif

            <h2 class="text-xl font-semibold mb-4">Envoyer un message</h2>

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
                @csrf

                <div>

                    <input name="name" required placeholder="Votre nom"
                        class="w-full p-3 border rounded-lg dark:bg-gray-700" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input name="email" required type="email" placeholder="Email"
                        class="w-full p-3 border rounded-lg dark:bg-gray-700" value="{{old('email')}}">
                    @error('email')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input name="subject" placeholder="Sujet" class="w-full p-3 border rounded-lg dark:bg-gray-700"
                        value="{{old('subject')}}">
                    @error('subject')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <textarea name="message" required rows="5" placeholder="Message"
                        class="w-full p-3 border rounded-lg dark:bg-gray-700">{{old('message')}}</textarea>
                    @error('message')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>

                <!-- anti spam simple -->
                <input type="text" name="honeypot" class="hidden">

                <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-semibold">
                    Envoyer
                </button>

            </form>

        </div>

        <!-- MAP -->
        
        <!-- RIGHT -->
        <div class="space-y-6">

            <!-- CONTACT QUICK -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">

                <h2 class="text-xl font-semibold mb-3">⚡ Contact rapide</h2>

                <a href="https://wa.me/22890000000"
                    class="block bg-green-500 text-white text-center py-2 rounded-xl mb-2">
                    WhatsApp
                </a>

                <a href="tel:+22890000000" class="block bg-blue-500 text-white text-center py-2 rounded-xl">
                    Appeler maintenant
                </a>

            </div>

            <!-- FAQ -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">

                <h2 class="text-xl font-semibold mb-4">❓ FAQ</h2>

                <div class="space-y-3">

                    <!-- item -->
                    <div>
                        <button onclick="toggleFaq(0)" class="w-full text-left font-semibold">
                            Comment publier un bien ?
                        </button>
                        <p class="faq hidden text-sm text-gray-500 mt-1">
                            Vous devez créer un compte puis accéder au dashboard vendeur.
                        </p>
                    </div>

                    <div>
                        <button onclick="toggleFaq(1)" class="w-full text-left font-semibold">
                            Comment contacter un vendeur ?
                        </button>
                        <p class="faq hidden text-sm text-gray-500 mt-1">
                            Via WhatsApp ou le bouton “discuter”.
                        </p>
                    </div>

                    <div>
                        <button onclick="toggleFaq(2)" class="w-full text-left font-semibold">
                            Est-ce gratuit ?
                        </button>
                        <p class="faq hidden text-sm text-gray-500 mt-1">
                            Oui, la consultation est gratuite.
                        </p>
                    </div>

                </div>

            </div>

            
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl shadow">

            <iframe class="w-full h-64 rounded-xl" src="https://maps.google.com/maps?q=komah%20sokode%20Togo&output=embed">
            </iframe>

        </div>

    </div>

</div>

<script>
    /* DARK MODE */
    function toggleDark() {
        document.documentElement.classList.toggle('dark');
        localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    }
    if (localStorage.theme === 'dark') {
        document.documentElement.classList.add('dark');
    }

    /* FAQ */
    function toggleFaq(i) {
        let items = document.querySelectorAll(".faq");
        items[i].classList.toggle("hidden");
    }
</script>
@endsection