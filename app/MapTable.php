<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapTable extends Model
{
    // Map class to map Database columns to CSV header columns
    protected $fillable = [
        'table_name', 'filename'
    ];
}
