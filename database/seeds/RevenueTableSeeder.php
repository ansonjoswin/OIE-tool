<?php

use Illuminate\Database\Seeder;

class RevenueTableSeeder extends CsvDataSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $table;

    public $filename;

    public function __construct()
    {
        $this->filename = __DIR__ . '/../../revenues.csv';
        $this->table = 'revenues';
    }

    public function run()
    {
        $revenuetable = new RevenueTableSeeder();
        $revenuetable->setTableName($this->table);
        $revenuetable->setFileName($this->filename);
        $revenuetable->setColumnMapping();
        $revenuetable->seedFromCSV($this->filename);
    }
}
