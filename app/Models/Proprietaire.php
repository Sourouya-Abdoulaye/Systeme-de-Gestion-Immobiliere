<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proprietaire extends Model
{
    //
   
    protected $table = 'proprietaires';
    protected $fillable = [
        'user_id',
    ];

        function biens(): HasMany
        {
            return $this->hasMany(Bien::class);
        }


        function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

}
