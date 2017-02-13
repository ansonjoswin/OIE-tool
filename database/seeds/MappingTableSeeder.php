<?php

use Illuminate\Database\Seeder;
use App\Map;
use App\MapTable;

class MappingTableSeeder extends Seeder
{

    public function run()
    {

        //Fill columns of the table with Database columns
        // and corresponding CSV header column names

        $file = 'C:\wamp64\www\unoistoie-acbat-feature-SchoolClass\mapping.csv';
        $content = file($file);

      $array = array();


        for($i = 0; $i < count($content); $i++) {
            $line = explode(',', $content[$i]);
            for($j = 0; $j < count($line); $j++) {
                $array[$i][$j + 1] = $line[$j];
            }
        }

      /* print_r(($array[0]));*/

            DB::table('maps')->delete();
            foreach ($array as $value)
            {
                /*echo(($value['1']));
                echo "\n";*/
                /*Map::create(['column_header' => $value['1']]);*/

             DB::table('maps')->insert([
                'column_header' =>$value['1'],
                 'csv_header'=>$value['2'],
                 'table_name'=>$value['3'],
                 'filename'=>$value['4'],
                 'created_at' => date_create(),
                 'updated_at' => date_create(),

             ]);
            }


        // Map::create([  'column_header' => 'unit_id', 'csv_header' => 'unitid', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        //Map::create([  'column_header' => 'school_name', 'csv_header' => 'instnm', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

       // Map::create([  'column_header' => 'school_city', 'csv_header' => 'city', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        //Map::create([  'column_header' => 'school_state', 'csv_header' => 'state', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        //Map::create([  'column_header' => 'longitude', 'csv_header' => 'longitud', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

       // Map::create([  'column_header' => 'latitude', 'csv_header' => 'latitude', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

       // Map::create([  'column_header' => 'created_by', 'csv_header' => 'created_by', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        //Map::create([  'column_header' => 'updated_by', 'csv_header' => 'updated_by', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        //Map::create([  'column_header' => 'created_at', 'csv_header' => 'created_at', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

       // Map::create([  'column_header' => 'updated_at', 'csv_header' => 'updated_at', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

    }
}

class MapTableSeeder extends Seeder {
    public function run()
    {
        //Fill names of tables in database and the corresponding CSV filename
        DB::table('map_tables')->delete();
        MapTable::create([ 'table_name' => 'testschool', 'filename' => 'hd2014','created_at' => date_create(), 'updated_at' => date_create()]);

    }
}