<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;

    protected $fillable = ['memo_id', 'nom_etape', 'texte_etape'];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function memo()
    {
        return $this->belongsTo(Memo::class);
    }
}
