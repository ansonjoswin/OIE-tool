<?php


Class SchoolTable extends CsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {

        $this->filename = __DIR__ . '/../..\resources\assets\csv\hd2014.csv';

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

Class CarnegieTable extends CMCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename = __DIR__ . '/../..\resources\assets\csv\hd2014.csv';
     
        $this->table = 'carnegie_classifications';
    }

    public function run()
    {
        $cngtable = new CarnegieTable();
        $cngtable->setTableName($this->table);
        $cngtable->setFileName($this->filename);
        $cngtable->setColumnMapping();
        $cngtable->seedFromCSV($this->filename);
    }
}

Class GraduationTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename = __DIR__ . '/../..\resources\assets\csv\gr200_14.csv';
        
        $this->table = 'graduations';
    }

    public function run()
    {
        $gradtable = new GraduationTable();
        $gradtable->setTableName($this->table);
        $gradtable->setFileName($this->filename);
        $gradtable->setColumnMapping();
        $gradtable->seedFromCSV($this->filename);
    }
}

Class ApplicationDetailsTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        //$this->filename =__DIR__ . '/../..\resources\assets\csv\adm2014.csv';
        $this->filename = __DIR__ . '/../..\resources\assets\csv\adm2014.csv';
        $this->table = 'applicationdetails';
    }

    public function run()
    {
        $appdettable = new ApplicationDetailsTable();
        $appdettable->setTableName($this->table);
        $appdettable->setFileName($this->filename);
        $appdettable->setColumnMapping();
        $appdettable->seedFromCSV($this->filename);
    }

}

Class CompletionsTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {
        //$this->filename =__DIR__ . '/../..\resources\assets\csv\adm2014.csv';
        $this->filename = __DIR__ . '/../..\storage\app\uploads\c2014_a.csv';
        $this->table = 'completions';
    }

    public function run()
    {
        $appdettable = new CompletionsTable();
        $appdettable->setTableName($this->table);
        $appdettable->setFileName($this->filename);
        $appdettable->setColumnMapping();
        $appdettable->seedFromCSV($this->filename);
    }

}