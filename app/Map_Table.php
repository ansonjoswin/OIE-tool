<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Map_Table extends Model
{
     // Map class to map Database columns to CSV header columns
	 public $table = "map_tables";
    protected $fillable = [
        'csv_name',
		'local_filename',
		'year'
    ];
	
	protected $primaryKey = 'Id';
	public static function getTableName() {
        return (new static)->getTable();
    }
}

