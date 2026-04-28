<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\ImageBien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     // echo "Liste des biens immobiliers";
    //     // ('status','disponible')
    //     $biens = Bien::with('images')->where('statut', 'disponible')->get();
    //     //    

    //     // foreach ($biens as $value) {
    //     //     foreach ($value->images as $image) {
    //     //         dump($image->url);
    //     //     }
    //     // }

    //     // dd($biens);
    //     return view("index", compact('biens'));
    // }

    public function index(Request $request)
    {
        $query = Bien::query();

        if ($request->search) {
            $query->where('titre', 'like', '%' . $request->search . '%');
        }

        if ($request->ville) {
            $query->where('ville', $request->ville);
        }

        if ($request->type) {
            $query->where('type', $request->type);
        }

        if ($request->min) {
            $query->where('prix', '>=', $request->min);
        }

        if ($request->max) {
            $query->where('prix', '<=', $request->max);
        }

        if ($request->ajax()) {
            return view('biens.partials.grid', compact('biens'))->render();
        }


        $biens = $query->latest()->paginate(2);

        return view('index', compact('biens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // echo "Formulaire de création d'un bien immobilier";
        return view("admin.biens.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //



        // dd($request->file('images'));
        // var_dump(Auth::user()->proprietaire->id);
        // Proprietaire::create([
        //     'user_id'=>Auth::user()->id
        // ]);
        // dd(Auth::user()->id);

        // dd($request->file());
        echo "Enregistrement d'un nouveau bien immobilier";

        $unBien = $request->validate(
            [
                'titre'       => ['required', 'string', 'min:3', 'max:255'],
                'description' => ['nullable', 'string', 'max:1000'],
                'type'        => ['required', 'string', 'in:maison,appartement,terrain,bureau'],
                'adresse'     => ['required', 'string', 'max:255'],
                'ville'       => ['required', 'string', 'max:100'],
                'pays'        => ['required', 'string', 'max:100'],
                'prix'        => ['required', 'numeric', 'min:0', 'max:999999999'],
                'statut'      => ['required', 'string', 'in:disponible,loue,vendu,brouillon'],
                'images'      => ['required', 'array', 'min:1'],
                'images.*'    => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            ],
            [
                // TITRE
                'titre.required' => "Le titre est obligatoire.",
                'titre.min'      => "Le titre est trop court.",
                'titre.max'      => "Le titre est trop long.",
                'description.max' => "La description est trop longue.",
                'type.in'   => "Données invalides.",
                'statut.in' => "Données invalides.",
                'adresse.required' => "L'adresse est obligatoire.",
                'ville.required'   => "La ville est obligatoire.",
                'pays.required'    => "Le pays est obligatoire.",

                'prix.required' => "Le prix est obligatoire.",
                'prix.numeric'  => "Données invalides.",
                'prix.min'      => "Le prix est invalide.",
                'prix.max'      => "Le prix est trop élevé.",

                'images.required' => "Veuillez ajouter au moins une image.",
                'images.array'    => "Données invalides.",
                'images.min'      => "Veuillez ajouter au moins une image.",
                'images.*.required' => "Image manquante.",
                'images.*.image'    => "Fichier invalide.",
                'images.*.mimes'    => "Format non autorisé.",
                'images.*.max'      => "Image trop volumineuse.",
            ]
        );

        // Bien::create($unBien);


        // dd($unBien);
        // 2. Création du bien
        $bien = Bien::create([
            'proprietaire_id' => Auth::user()->proprietaire->id,
            'titre'           => $unBien['titre'],
            'description'     => $unBien['description'] ?? null,
            'type'            => $unBien['type'],
            'adresse'         => $unBien['adresse'],
            'ville'           => $unBien['ville'],
            'pays'            => $unBien['pays'],
            'prix'            => $unBien['prix'],
            'statut'          => $unBien['statut'],
        ]);

        // 3. Upload des images
        // il peut ne pas avoir l'erreur lors de la validation et ici 

        if ($request->file('images') != null) {
            foreach ($request->file('images') as $image) {

                $path = $image->store('biens', 'public');

                ImageBien::create([
                    'bien_id' => $bien->id,
                    'url'     => $path,
                ]);
            }
        }




        return to_route("dashboard");

        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $bien = Bien::findOrFail($id);
        $similaires = Bien::whereNot('id', $id)->get();
        // echo "Détails du bien immobilier avec l'ID : " . $id;

        // dd($similaires);
        return view("show", compact('bien', 'similaires'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $bien = Bien::findOrFail($id);
        //
        // echo "Formulaire d'édition du bien immobilier avec l'ID : " . $id;
        return view("admin.biens.edit", compact('bien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        echo "Mise à jour du bien immobilier avec l'ID : " . $id;
        dd($request);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        echo "Suppression du bien immobilier avec l'ID : " . $id;
    }
}
