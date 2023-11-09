<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departement;

class Employe extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}