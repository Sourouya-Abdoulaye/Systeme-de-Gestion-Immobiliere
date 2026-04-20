<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    //
    protected $table = 'biens';
    protected $fillable = [
        'titre',
        'description',
        'prix',
        'adresse',
        'type',
        'statut',       
    ];



    function proprietaire() : BelongsTo
    {
        return $this->belongsTo(Proprietaire::class);
    }
}
