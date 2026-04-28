<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    //

    public  function dashboard()
    {
        $biens= Bien::query()->orderBy('created_at','desc')->paginate(3);
        $nbrBien=Bien::nbrBiens();
       

        // dump($biens);
    

        return view('statistique',compact('biens','nbrBien'));
    }
}
