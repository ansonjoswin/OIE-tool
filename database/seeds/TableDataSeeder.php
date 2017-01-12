<?php
/**
 * Created by PhpStorm.
 * User: shivanisingh
 * Date: 1/8/17
 * Time: 9:36 PM
 */

Class SchoolTable extends CsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename = __DIR__ . '/../../schools.csv';
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