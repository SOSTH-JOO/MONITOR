<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErsBalanceCheck extends Model
{
    protected $connection = 'mysql_second'; // Connexion secondaire
    protected $table = 'ers_balance_check';
}
