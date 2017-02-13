<?php

use Illuminate\Database\Seeder;


class SchoolTable extends CsvDataSeeder
{
     public $table;

    public $filename;

    public function __construct()
    {
        $this->filename = 'C:\wamp64\www\unoistoie-acbat\schools.csv';
        //__DIR__ . '/../../schools.csv';
        $this->table = 'schools';
    }

    public function run()
    {
        $schooltable = new SchoolTable();
        $schooltable->setTableName($this->table);
        $schooltable->setFileName($this->filename);
        $schooltable->setColumnMapping();
        $schooltable->seedFromCSV($this->filename);
    }
}
