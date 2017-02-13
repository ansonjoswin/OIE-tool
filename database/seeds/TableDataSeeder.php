<?php


Class SchoolTable extends CsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename ='C:\wamp64\www\unoistoie-acbat-feature-SchoolClass\hd2014.csv';
        $this->table = 'testschool';
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