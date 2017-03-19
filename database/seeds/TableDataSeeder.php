<?php


Class SchoolTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {

       // $getfilename= DB::Table('map_tables')->where('local_filename', '=', 'schools')->value('csv_name');
        //$path= '/../..\storage\app\uploads';
       // $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;
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

        //$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'schools')->value('csv_name');
       // $path= '/../..\storage\app\uploads';
        //$this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;
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

Class StudentTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {

        $getfilename= DB::Table('map_tables')->where('local_filename', '=', 'students')->value('csv_name');
        $path= '/../..\storage\app\uploads';
        $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;
        $this->table = 'students';
    }

    public function run()
    {
        $gradtable = new StudentTable();
        $gradtable->setTableName($this->table);
        $gradtable->setFileName($this->filename);
        $gradtable->setColumnMapping();
        $gradtable->seedFromCSV($this->filename);
    }
}

Class EmployeeTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {

        $getfilename= DB::Table('map_tables')->where('local_filename', '=', 'employees')->value('csv_name');
        $path= '/../..\storage\app\uploads';
        $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;
        $this->table = 'employees';
    }

    public function run()
    {
        $gradtable = new EmployeeTable();
        $gradtable->setTableName($this->table);
        $gradtable->setFileName($this->filename);
        $gradtable->setColumnMapping();
        $gradtable->seedFromCSV($this->filename);
    }

}

Class DefaultRateTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {

        $getfilename= DB::Table('map_tables')->where('local_filename', '=', 'defaultrates')->value('csv_name');
        $path= '/../..\storage\app\uploads';
        $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;
        $this->table = 'defaultrates';
    }

    public function run()
    {
        $gradtable = new DefaultRateTable();
        $gradtable->setTableName($this->table);
        $gradtable->setFileName($this->filename);
        $gradtable->setColumnMapping();
        $gradtable->seedFromCSV($this->filename);
    }

}

Class FinanceTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {

        $getfilename= DB::Table('map_tables')->where('local_filename', '=', 'finances')->value('csv_name');
        $path= '/../..\storage\app\uploads';
        $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;
        $this->table = 'finances';
    }

    public function run()
    {
        $gradtable = new FinanceTable();
        $gradtable->setTableName($this->table);
        $gradtable->setFileName($this->filename);
        $gradtable->setColumnMapping();
        $gradtable->seedFromCSV($this->filename);
    }

}