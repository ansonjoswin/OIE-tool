<?php


Class SchoolTable extends CsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename ='C:\wamp64\www\unoistoie-acbat\hd2014.csv';
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

Class CngTable extends CMCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename ='C:\wamp64\www\unoistoie-acbat\hd2014.csv';
        $this->table = 'carneige_classifications';
    }

    public function run()
    {
        $cngtable = new CngTable();
        $cngtable->setTableName($this->table);
        $cngtable->setFileName($this->filename);
        $cngtable->setColumnMapping();
        $cngtable->seedFromCSV($this->filename);
    }
}

Class GradTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename ='C:\wamp64\www\unoistoie-acbat\gr200_14.csv';
        $this->table = 'graduations';
    }

    public function run()
    {
        $gradtable = new GradTable();
        $gradtable->setTableName($this->table);
        $gradtable->setFileName($this->filename);
        $gradtable->setColumnMapping();
        $gradtable->seedFromCSV($this->filename);
    }
}