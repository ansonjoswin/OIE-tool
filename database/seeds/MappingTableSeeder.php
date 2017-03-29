<?php

use Illuminate\Database\Seeder;
use App\Map;
use App\MapTable;

class MappingTableSeeder extends Seeder {

    public function run()
    {

        //Fill columns of the table with Database columns
        // and corresponding CSV header column names
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

        Map::create([  'column_header' => 'year', 'csv_header' => 'year', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'degree_type', 'csv_header' => 'degree_type', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'total', 'csv_header' => 'total', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'men', 'csv_header' => 'men', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'women', 'csv_header' => 'women', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'part_time_total', 'csv_header' => 'part_time_total', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'part_time_men', 'csv_header' => 'part_time_men', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'part_time_women', 'csv_header' => 'part_time_women', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'full_time_total', 'csv_header' => 'full_time_total', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'full_time_men', 'csv_header' => 'full_time_men', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'full_time_women', 'csv_header' => 'full_time_women', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'school_id', 'csv_header' => 'school_id', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_by', 'csv_header' => 'created_by', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_by', 'csv_header' => 'updated_by', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_at', 'csv_header' => 'created_at', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_at', 'csv_header' => 'updated_at', 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'year', 'csv_header' => 'year', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'core_expenses_source', 'csv_header' => 'core_expenses_source', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'core_expenses', 'csv_header' => 'core_expenses', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'school_id', 'csv_header' => 'school_id', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_by', 'csv_header' => 'created_by', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_by', 'csv_header' => 'updated_by', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_at', 'csv_header' => 'created_at', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_at', 'csv_header' => 'updated_at', 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'year', 'csv_header' => 'year', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'core_revenue_source', 'csv_header' => 'core_revenue_source', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'core_revenue', 'csv_header' => 'core_revenue', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'school_id', 'csv_header' => 'school_id', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_by', 'csv_header' => 'created_by', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_by', 'csv_header' => 'updated_by', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'created_at', 'csv_header' => 'created_at', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

        Map::create([  'column_header' => 'updated_at', 'csv_header' => 'updated_at', 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);

    }
}

class MapTableSeeder extends Seeder {
    public function run()
    {
        //Fill names of tables in database and the corresponding CSV filename
        DB::table('maps')->delete();
        DB::table('map_tables')->delete();
        MapTable::create([ 'table_name' => 'schools', 'filename' => 'schools', 'created_at' => date_create(), 'updated_at' => date_create()]);

        MapTable::create([ 'table_name' => 'students', 'filename' => 'students', 'created_at' => date_create(), 'updated_at' => date_create()]);

        MapTable::create([ 'table_name' => 'expenses', 'filename' => 'expenses', 'created_at' => date_create(), 'updated_at' => date_create()]);

        MapTable::create([ 'table_name' => 'revenues', 'filename' => 'revenues', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}