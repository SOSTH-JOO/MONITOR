<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataForBandCurve extends Model
{
    protected $connection = 'mysql_second';
    protected $table = 'data_for_band_curve';
    protected $fillable = ['value1', 'value2'];


}
