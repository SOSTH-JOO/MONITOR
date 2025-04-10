<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'explication_titre'];

    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }
}
