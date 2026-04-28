@extends('dashboard')


@section('titre','Statistique')
@section('content')
<!-- CONTENT -->
<section class="max-w-full mx-auto px-4 py-6 space-y-6">


    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div class="bg-white dark:bg-slate-800 rounded-xl p-5 border dark:border-slate-700">
            <p class="text-sm text-slate-500">biens</p>
            <p class="text-2xl font-semibold">{{$nbrBien}}</p>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-xl p-5 border dark:border-slate-700">
            <p class="text-sm text-slate-500">Transactions</p>
            <p class="text-2xl font-semibold">320</p>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-xl p-5 border dark:border-slate-700">
            <p class="text-sm text-slate-500">Régions</p>
            <p class="text-2xl font-semibold">15</p>
        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border dark:border-slate-700 overflow-hidden">

        <div
            class="p-4 border-b dark:border-slate-700 flex flex-col sm:flex-row sm:justify-between gap-3 sm:items-center">
            <h2 class="font-semibold">Derniers biens</h2>

            <div class="flex gap-2">
                <select
                    class="border w-40 dark:border-slate-600  dark:bg-slate-600 rounded-lg px-2 py-2 text-sm bg-transparent">
                    <option>Tous</option>
                    <option>Disponible</option>
                    <option>Vendu</option>
                </select>

                <input placeholder="Rechercher..."
                    class="border dark:border-slate-600 rounded-lg px-3 py-2 text-sm w-full sm:w-56 bg-transparent">
            </div>

        </div>

        <!-- TABLE BODY -->
        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50 dark:bg-slate-700 text-slate-500 dark:text-slate-300">
                    <tr>
                        <th class="text-left p-3">Titre</th>
                        <th class="text-left p-3">Ville</th>
                        <th class="text-left p-3">Prix</th>
                        <th class="text-left p-3">Statut</th>
                        <th class="text-right p-3">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($biens as $bien)
                    <!-- ROW 2 -->
                    <tr class="border-t dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700">
                        <td class="p-3 font-medium">{{$bien->titre}}</td>
                        <td class="p-3 text-slate-500">{{$bien->ville}}</td>
                        <td class="p-3 text-cyan-600 font-semibold">{{$bien->prix}} FCFA</td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                {{$bien->statut}}
                            </span>
                        </td>

                        <td class="p-3 text-right space-x-2">

                            <!-- SHOW -->
                            <a href="{{route('biens.show',['id'=>$bien->id])}}">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </button>
                            </a>

                            <!-- EDIT -->
                            <a href="{{route('admin.biens.edit',['id'=>$bien->id])}}">
                                <button class="text-indigo-600 hover:text-indigo-800">
                                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                                </button>
                            </a>

                            <!-- DELETE -->
                            <form action="{{route('admin.biens.delete',['id'=>$bien->id])}}" method="post"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr class="w-full"> Accun bien enregistrer</tr>
                    @endforelse
                </tbody>

            </table>

        </div>



    </div>
    <div class="mt-8">
        {{ $biens->links() }}
    </div>

</section>

@endsection