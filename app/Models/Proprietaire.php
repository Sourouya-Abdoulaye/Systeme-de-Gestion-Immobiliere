<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    //
   
    protected $table = 'proprietaires';
    protected $fillable = [
        'user_id',
    ];

        function biens()
        {
            return $this->hasMany(Bien::class);
        }

}
