<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolTableSeeder extends Seeder
{

    public $table;

    public $filename;

    public $insert_chunk_size = 50;

    public $csv_delimiter = ',';

    public $offset_rows = 1;

    public function __construct()
    {
        $this->filename = __DIR__ . '/../../schools.csv';
        $this->table = School::getTableName();
    }

    public function run()
    {
        $this->seedFromCSV($this->filename, $this->csv_delimiter);
    }

    public function openCSVfile($filename)
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            Log::error("CSV insert failed" . $filename . "does not exist or is not readable");
        }

        $handle = fopen($filename, 'r');
        return $handle;
    }

    public function seedFromCSV($filename, $delimiter = ',')
    {
        $handle = $this->openCSVfile($filename);

        if ($handle == FALSE) {
            return [];
        }

        $header = NULL;
        $offset = $this->offset_rows;

        while (($row = fgetcsv($handle, 0, $delimiter)) != FALSE) {
            while ($offset > 0) {
                $offset--;
                continue 2;
            }

            $this->insert($row);
        }

        fclose($handle);
        return $row;
    }

    public function insert(array $seedData)
    {

        try {
            $columns = Schema::getColumnListing($this->table);
            $offset = $this->offset_rows;

            DB::table($this->table)->insert(
                array($columns[0 + $offset] => $seedData[0], $columns[1 + $offset] => $seedData[1], $columns[2 + $offset] => $seedData[2], $columns[3 + $offset] => $seedData[3],
                    $columns[4 + $offset] => $seedData[4], $columns[5 + $offset] => $seedData[5], $columns[6 + $offset] => $seedData[6], $columns[7 + $offset] => $seedData[7],
                    $columns[8 + $offset] => $seedData[8], $columns[9 + $offset] => $seedData[9]));
        } catch (\Exception $e) {
            Log::error("CSV file insert failed:" . $e->getMessage() . " - CSV" . $this->filename);
            return FALSE;
        }
        return TRUE;


    }


}