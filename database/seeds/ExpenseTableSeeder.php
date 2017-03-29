<?php

use Illuminate\Database\Seeder;

class ExpenseTableSeeder extends CsvDataSeeder
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
        $this->filename = __DIR__ . '/../../expenses.csv';
        $this->table = 'expenses';
    }

    public function run()
    {
        $expensetable = new ExpenseTableSeeder();
        $expensetable->setTableName($this->table);
        $expensetable->setFileName($this->filename);
        $expensetable->setColumnMapping();
        $expensetable->seedFromCSV($this->filename);
    }
}
