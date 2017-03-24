<?php
use Illuminate\Database\Seeder;
use App\School;
use App\Carnegie_Classification;

abstract class CMCsvDataSeeder extends Seeder
{
    public $table;
    public $filename;
    public $insert_chunk_size = 500;
    public $csv_delimiter = ',';
    public $offset_rows = 1;
    // Array to store Database column names
    public $mapping = [];
		// Array to store column names in CSV
	public $Csv_header_array = [];
    public function setTableName($tablename)
    {
        $this->table = $tablename;
    }
    public function setFileName($filename)
    {
        $this->filename = $filename;
    }
    public function setColumnMapping()
    {
        //Retrieve the column names of the table
        // and store them in the array
        $columns = Schema::getColumnListing($this->table);
        $i = 0;
        while ($i < (sizeof($columns))) {
            array_push($this->mapping, $columns[$i]);
            $i++;
        }
    }
    public function openCSV($filename)
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            Log::error("CSV insert failed" . $filename . "does not exist or is not readable");
        }
        $handle = fopen($filename, 'r');
        return $handle;
    }
    public function seedFromCSV($filename, $deliminator = ',')
    {
		// it helps to distinguish where the line ends,  referred - http://php.net/manual/pl/function.fgetcsv.php
		ini_set('auto_detect_line_endings',TRUE);
        $handle = $this->openCSV($filename);
        // CSV doesn't exist or couldn't be read from.
        if ( $handle === FALSE )
            return [];
        $header = NULL;
        $row_count = 0;
        $data = [];
        // Array to store CSV Header column names
        //$Csv_header_array = [];
        $mapping = $this->mapping ?: [];
        $offset = $this->offset_rows;
        while ( ($row = fgetcsv($handle, 0, $deliminator)) !== FALSE )
        {
            // Offset the specified number of rows
            while ( $offset > 0 )
            {
                //If the row being read is the first,
                //store the CSV header names in the array
                $index = 0;
                while ($index < sizeof($row)) {
                    array_push($this->Csv_header_array, $row[$index]);
                    $index++;
                }
                $offset--;
                continue 2;
            }
			//it helps to distinguish where the line ends,  referred - http://php.net/manual/pl/function.fgetcsv.php
			ini_set('auto_detect_line_endings',FALSE);

			//
			$Csv_header_array = $this->Csv_header_array ?: [];
            // No mapping specified - grab the first CSV row and use it
            if ( !$mapping )
            {
                $mapping = $row;
            }
            else
            {
                // Array to store a map of CSV column headers
                // to the corresponding values
                $source_array = $this->readRow($row, $Csv_header_array);
                // Create a map of database column names to
                // the corresponding values
                $row = $this->fillMapArray($source_array, $mapping);
                // insert only non-empty rows from the csv file
                if ( !$row )
                    continue;
                $data[$row_count] = $row;
                // Chunk size reached, insert
                if ( ++$row_count == $this->insert_chunk_size )
                {
                    //var_dump($this->insert($data));
                    $this->insert($data);
                    $row_count = 0;
                    //var_dump($data[0]);
                    // clear the data array explicitly to
                    // avoid duplicate inserts
                    $data = array();
                }
            }
        }
        // Insert any leftover rows
        if ( count($data)  )
            $this->insert($data);
        fclose($handle);
        return $data;
    }
    public function readRow( array $row, array $Csv_header_array )
    {
        // Read the values of CSV column headers and map them
        // into an array
        $source_array = [];
        foreach ($Csv_header_array as $index => $csvCol) {
            if (!isset($row[$index]) || $row[$index] === '') {
                $source_array[$csvCol] = NULL;
            }
            else {
                $source_array[$csvCol] = $row[$index];
            }
        }
        return $source_array;
    }
    public function fillMapArray($source_array, $mapping) {

        $row_values = [];
        //$columns = Schema::getColumnListing('maps');
		//	
		$Csv_header_array = $this->Csv_header_array ?: [];
        $no_of_columns_to_fill = sizeof($source_array);
        // Retrieve the CSV column header corresponding to
        // the Database column and store in a map


		while ($no_of_columns_to_fill > 0) {
			foreach($mapping as $dbCol) {
				//dd($mapping);
           //dd($dbCol);  -- dbCol is table columns and Column[1] is just the columns csv has. taking out cav column name for that corresponding now noe dbcol
		   //name and csv column name is same .. so we need to check for each dbCol if CSV header column is thr -- insert
		   // loop
			foreach($Csv_header_array as $csv_Column_name){

				//dd($source_array);

					if ($dbCol === 'year') {
						//$tempFilename = basename($this->filename);
						//$yearColumn = DB::Table('map_tables')->where('csv_name', '=', $tempFilename)->value('year');
						//$row_values[$dbCol] = $yearColumn;
						$row_values[$dbCol] = 2014;

					}
					else{

							if ($dbCol === 'school_id') {
								$temp1 = DB::Table('schools')->where('unitid', '=',$source_array['UNITID'])->value('id');
								$row_values[$dbCol] = $temp1;
							}
							else{

									if ($csv_Column_name === $dbCol){
									$row_values[$dbCol] = $source_array[$csv_Column_name];
									$no_of_columns_to_fill--;
									}
									else{
									$no_of_columns_to_fill--;
									}
								}
						}

			}	}
        }

        //var_dump($row_values);
        return $row_values;
    }

    public function insert( array $seedData )
    {
        try {

            foreach ($seedData as $row) {
                if($row)
                {
                   DB::table($this->table)->insert($row);
                }
            }
        } catch (\Exception $e) {
            Log::error("CSV insert failed: " . $e->getMessage() . " - CSV " . $this->filename);
            return FALSE;
        }
        return TRUE;
    }
}
