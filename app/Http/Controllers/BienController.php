<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        echo "Enregistrement d'un nouveau bien immobilier";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        echo "Détails du bien immobilier avec l'ID : " . $id;
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
