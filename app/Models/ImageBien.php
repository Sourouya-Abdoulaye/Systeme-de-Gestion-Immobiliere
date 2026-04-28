<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageBien extends Model
{
    //
    protected $table = 'image_biens';
    protected $fillable = [
        'bien_id',
        'url',
    ];

     function images(): BelongsTo
    {
        return $this->BelongsTo(Bien::class);
    }
    

    
}
