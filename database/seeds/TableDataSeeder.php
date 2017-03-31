<?php


Class SchoolTable extends CsvDataSeeder
{
    public $table;

    public $filename;

    public function __construct()
    {

       //$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'schools')->value('csv_name');
		
		//$path= '/../..\resources\assets\csv';
		
		//$this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;
		
		$this->filename =__DIR__ . '/../..\resources\assets\csv\school_2014.csv';

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
		
		$this->filename =__DIR__ . '/../..\resources\assets\csv\carnegie_2014.csv';
         //$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'fallenrollment')->value('csv_name');
		
		//$path= '/../..\resources\assets\csv';
		
		//$this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;


     
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

Class DataTable extends OtherCsvDataSeeder
{
    public $table;
    public $filename;

    public function __construct()
    {
        $this->filename =__DIR__ . '/../..\resources\assets\csv\datatable_final.csv';

        //$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'admissions')->value('csv_name');

        // $path= '/../..\resources\assets\csv';

        // $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;

        $this->table = 'datatable';
    }

    public function run()
    {
        $datatable = new DataTable();
        $datatable->setTableName($this->table);
        $datatable->setFileName($this->filename);
        $datatable->setColumnMapping();
        $datatable->seedFromCSV($this->filename);
    }
}


Class StudentTable extends OtherCsvDataSeeder
{
    public $table;

    public $filename;
	
	

    public function __construct()
    {
        $this->filename =__DIR__ . '/../..\resources\assets\csv\student_2014.csv';

		//$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'admissions')->value('csv_name');

		/*$path= '/../..\resources\assets\csv';
		
		$this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;*/
        
         $this->table = 'students';
    }

    public function run()
    {
        $studenttable = new StudentTable();
        $studenttable->setTableName($this->table);
        $studenttable->setFileName($this->filename);
		//$studenttable->getTableName($this->filename1);
        $studenttable->setColumnMapping();
        $studenttable->seedFromCSV($this->filename);
    }
}

Class FinanceTable extends OtherCsvDataSeeder
{
    public $table;
    public $filename;
    public function __construct()
    {
        $this->filename =__DIR__ . '/../..\resources\assets\csv\finance_2014.csv';
        //$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'admissions')->value('csv_name');
        /*$path= '/../..\resources\assets\csv';
        $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;*/
        $this->table = 'finances';
    }
    public function run()
    {
        $financetable = new FinanceTable();
        $financetable->setTableName($this->table);
        $financetable->setFileName($this->filename);
        $financetable->setColumnMapping();
        $financetable->seedFromCSV($this->filename);
    }
}
Class EmployeeTable extends OtherCsvDataSeeder
{
    public $table;
    public $filename;
    public function __construct()
    {
        $this->filename =__DIR__ . '/../..\resources\assets\csv\employee_2014.csv';
        //$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'admissions')->value('csv_name');
        /*$path= '/../..\resources\assets\csv';
        $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;*/
        $this->table = 'employees';
    }
    public function run()
    {
        $financetable = new EmployeeTable();
        $financetable->setTableName($this->table);
        $financetable->setFileName($this->filename);
        $financetable->setColumnMapping();
        $financetable->seedFromCSV($this->filename);
    }
}



Class DefaultRateTable extends DefaultDataSeeder
{
    public $table;

    public $filename;



    public function __construct()
    {
        $this->filename =__DIR__ . '/../..\resources\assets\csv\defaultrate_final.csv';

        //$getfilename= DB::Table('map_tables')->where('local_filename', '=', 'admissions')->value('csv_name');

        /*$path= '/../..\resources\assets\csv';

        $this->filename = __DIR__ . $path . DIRECTORY_SEPARATOR . $getfilename;*/

        $this->table = 'defaultrates';
    }

    public function run()
    {
        $defaultratetable = new DefaultRateTable();
        $defaultratetable->setTableName($this->table);
        $defaultratetable->setFileName($this->filename);
        $defaultratetable->setColumnMapping();
        $defaultratetable->seedFromCSV($this->filename);
    }
}

