<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    //
    protected $table = 'biens';
    protected $fillable = [
        'proprietaire_id',
        'titre',
        'description',
        'type',
        'adresse',
        'ville',
        'pays',
        'prix',
        'statut',
    ];



    function proprietaire(): BelongsTo
    {
        return $this->belongsTo(Proprietaire::class);
    }

    function images(): HasMany
    {
        return $this->hasMany(ImageBien::class);
    }


    public function firstImage()
    {
        return $this->images()->first();
    }

    
    public static function nbrBiens() {
        return count(Bien::all());
    }

    
}
