<?php

use Illuminate\Database\Seeder;


use App\Tag;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the attributes tables
        $this->call(InstcatSeeder::class);
        $this->call(StabbrSeeder::class);
        $this->call(CcbasicSeeder::class);

        //Seed the System Users/Roles/Permissions tables
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(UsersRolesPermissions::class);
        //$this->call(MappingTableSeeder::class);

        //Seed Main Tables
        $this->call(SchoolTable::class);
        $this->call(CarnegieTable::class);

        //Seed Datatable
         $this->call(DataTable::class);

         //Seed Peergroups
        $this->call(PeerGroupSeeder::class);
        $this->call(PeerGroupSchoolTable::class);

        //Seed other tables
        $this->call(StudentTable::class);
        $this->call(FinanceTable::class);
        $this->call(EmployeeTable::class);
        $this->call(DefaultRateTable::class);
       
        $this->command->info('Tables seeded!');

        // Seed the Tags table
        //$this->call(TagsTableSeeder::class);
        //$this->command->info('Tags tables seeded!');
    }
}

class TagsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tags')->delete();
        Tag::create([ 'name' => 'Athlete']);
        Tag::create([ 'name' => 'First Generation']);
        Tag::create([ 'name' => 'Graduate']);
        Tag::create([ 'name' => 'International']);
        Tag::create([ 'name' => 'Military & Veteran']);
        Tag::create([ 'name' => 'Retention Risk']);
        Tag::create([ 'name' => 'Scotts Scholar']);
        Tag::create([ 'name' => 'Undergraduate']);
    }
}
