<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTable extends Model
{
    //
    public $table = "datatable";
    protected $fillable=[
    		'ug_headcount',
            'admin_count',
            'inst_count' ,
            'admin_sal',
            'inst_sal' ,
            'admin_stu' ,
            'inst_stu' ,
            'grad_rate4' ,
            'grad_rate6',
            'deg_stu' ,
            'avg_sch_stu' ,
            'loan_rate'
            ];

            
}
