<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['etape_id', 'commande'];

    public function etape()
    {
        return $this->belongsTo(Etape::class);
    }
}
