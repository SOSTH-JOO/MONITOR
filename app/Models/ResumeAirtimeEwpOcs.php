<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeAirtimeEwpOcs extends Model
{
    protected $connection = 'mysql_second';
    protected $table = 'resume_airtime_ewp_ocs';

    // protected $fillable = [
    //     'dateid', 'ewp_total', 'ewp_amount',
    //     'ocs_total', 'ocs_amount', 'gap_total', 'gap_amount'
    // ];

    public $timestamps = true;
}
