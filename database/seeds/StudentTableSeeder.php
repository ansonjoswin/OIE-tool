<?php

Class StudentTable extends CsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename = __DIR__ . '/../../students.csv';
        $this->table = 'students';
    }

    public function run()
    {
        $studenttable = new StudentTable();
        $studenttable->setTableName($this->table);
        $studenttable->setFileName($this->filename);
        $studenttable->setColumnMapping();
        $studenttable->seedFromCSV($this->filename);
    }
}