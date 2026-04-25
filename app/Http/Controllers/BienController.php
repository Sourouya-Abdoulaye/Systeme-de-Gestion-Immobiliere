<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // echo "Liste des biens immobiliers";
        return view("index");
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
        dd(Auth::user()->id);

        echo "Enregistrement d'un nouveau bien immobilier";
        $unBien = $request->validate(
            [
                'proprietaire_id' => ['required', 'integer', 'exists:users,id'],
                'titre'           => ['required', 'string', 'min:3'],
                'description'     => ['nullable', 'string'],
                'type'            => ['required', 'string', 'in:maison,appartement,terrain,bureau'],
                'adresse'         => ['required', 'string'],
                'ville'           => ['required', 'string'],
                'pays'            => ['required', 'string'],
                'prix'            => ['required', 'numeric', 'min:0'],
                'statut'          => ['required', 'string', 'in:disponible,loue,vendu'],
            ],
            [
                'titre.required'        => "Le titre est obligatoire",
                'titre.min'             => "Le titre doit contenir au moins 3 caractères",
                'prix.required'         => "Le prix est obligatoire",
                'prix.numeric'          => "Le prix doit être un nombre",
                'prix.min'              => "Le prix doit être supérieur ou égal à 0",
                'type.in'               => "Type invalide",
                'statut.in'             => "Statut invalide",
                'proprietaire_id.exists' => "Le propriétaire n'existe pas",
            ]
        );

        // Bien::create($unBien);

        dump($unBien);
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        echo "Détails du bien immobilier avec l'ID : " . $id;
        return view("show", ["id" => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // echo "Formulaire d'édition du bien immobilier avec l'ID : " . $id;
        return view("admin.biens.edit", ["id" => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        echo "Mise à jour du bien immobilier avec l'ID : " . $id;
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        echo "Suppression du bien immobilier avec l'ID : " . $id;
    }
}
