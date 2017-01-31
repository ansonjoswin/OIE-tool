<?php

use Illuminate\Database\Seeder;
use App\School;

abstract class CsvDataSeeder extends Seeder
{
    public $table;

    public $filename;

    public $insert_chunk_size = 500;

    public $csv_delimiter = ',';

    public $offset_rows = 1;

    public $mapping = [];

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
        $columns = Schema::getColumnListing($this->table);
        $i = 0;
        while ($i < (sizeof($columns) - 1)) {
            array_push($this->mapping, $columns[$i+1]);
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
        $handle = $this->openCSV($filename);
        // CSV doesn't exist or couldn't be read from.
        if ( $handle === FALSE )
            return [];
        $header = NULL;
        $row_count = 0;
        $data = [];
        $mapping = $this->mapping ?: [];
        $offset = $this->offset_rows;
        while ( ($row = fgetcsv($handle, 0, $deliminator)) !== FALSE )
        {
            // Offset the specified number of rows
            while ( $offset > 0 )
            {
                $offset--;
                continue 2;
            }
            // No mapping specified - grab the first CSV row and use it
            if ( !$mapping )
            {
                $mapping = $row;
            }
            else
            {
                $row = $this->readRow($row, $mapping);
                // insert only non-empty rows from the csv file
                if ( !$row )
                    continue;
                $data[$row_count] = $row;
                // Chunk size reached, insert
                if ( ++$row_count == $this->insert_chunk_size )
                {
                    $this->insert($data);
                    $row_count = 0;
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

    public function readRow( array $row, array $mapping )
    {
        $row_values = [];
        foreach ($mapping as $csvCol => $dbCol) {
            if (!isset($row[$csvCol]) || $row[$csvCol] === '') {
                $row_values[$dbCol] = NULL;
            }
            else {
                $row_values[$dbCol] = $row[$csvCol];
            }
        }
        return $row_values;
    }

    public function insert( array $seedData )
    {
        try {
            DB::table($this->table)->insert($seedData);
        } catch (\Exception $e) {
            Log::error("CSV insert failed: " . $e->getMessage() . " - CSV " . $this->filename);
            return FALSE;
        }
        return TRUE;
    }
}
