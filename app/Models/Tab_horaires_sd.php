<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Tab_horaires_sd extends Model
{

    protected $table = 'tab_horaires_sds';
    public $timestamps = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'AutoTrav','ConsCatAMHT','DepInstSE','ATTX','EnginLieuTrav', 'DebTrav','AVC','DerniereTBA',
        'FinTravCoupeRail', 'DegRampe','FinBourr','DepTTXChan',
    ];
}
