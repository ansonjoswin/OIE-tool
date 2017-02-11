<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class UG_UnduplicatedHeadCount extends Model
{
    public $table = "ug_unduplicatedheadcounts";
    protected $fillable=[
        'UG_UndupHdcnt_ID',
        'School_ID',
        'Dgr_Lvl_Enrl',
        'Year',
        'Dgr_Lvl_Cmpd',
        'UG_Ttl_Enrl',
        'UG_Ttl_M_Enrl',
        'UG_Ttl_F_Enrl',
        'UG_Amer_Ind_or_Alk_Ttl',
        'UG_Amer_Ind_or_Alk_M',
        'UG_Amer_Ind_or_Alk_F',
        'UG_Asian_Ttl',
        'UG_Asian_M',
        'UG_Asian_F',
        'UG_Blk_or_Afro_Amer_Ttl',
        'UG_Blk_or_Afro_Amer_M',
        'UG_Blk_or_Afro_Amer_F',
        'UG_Hispo_or_Lat_Ttl',
        'UG_Hispo_or_Lat_M',
        'UG_Hispo_or_Lat_F',
        'UG_HW_or_PAC_Ttl',
        'UG_HW_or_PAC_M',
        'UG_HW_or_PAC_F',
        'UG_WHT_Ttl',
        'UG_WHT_M',
        'UG_WHT_F',
        'UG_TwoOrMore_RaceTtl',
        'UG_TwoOrMore_RaceM',
        'UG_TwoOrMore_RaceF',
        'UG_Race_UK_Ttl',
        'UG_Race_UK_M',
        'UG_Race_UK_F',
        'UG_NR_Alien_Ttl',
        'UG_NR_Alien_M',
        'UG_NR_Alien_F',
    ];
    protected $primaryKey = 'UG_UndupHdcnt_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }

}

