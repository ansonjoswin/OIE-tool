<?php

use Illuminate\Database\Seeder;
use App\Map;
use App\MapTable;

class MappingTableSeeder extends Seeder {

    public function run()
    {

        //Fill columns of the table with Database columns
        // and corresponding CSV header column names
        DB::table('maps')->delete();
        Map::create([  'column_header' => 'unit_id', 'csv_header' => 'unitid', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'school_name', 'csv_header' => 'instnm', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'school_city', 'csv_header' => 'city', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'school_state', 'csv_header' => 'state', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'longitude', 'csv_header' => 'longitud', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'latitude', 'csv_header' => 'latitude', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_by', 'csv_header' => 'created_by', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_by', 'csv_header' => 'updated_by', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_at', 'csv_header' => 'created_at', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_at', 'csv_header' => 'updated_at', 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

    }
}

class MapTableSeeder extends Seeder {
    public function run()
    {
        //Fill names of tables in database and the corresponding CSV filename
        DB::table('map_tables')->delete();
        MapTable::create([ 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}