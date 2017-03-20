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

         //Seed the System Users/Roles/Permissions tables
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(UsersRolesPermissions::class);

        $this->call(MappingTableSeeder::class);
        //$this->call(DataTable::class);
        $this->call(SchoolTable::class);
        //$this->call(CMSeeder::class);
        $this->command->info('User, Role, Permission, Schools tables seeded!');
        $this->call(CarnegieTable::class);
        // $this->call(GraduationTable::class);
        // $this->call(ApplicationDetailsTable::class);
        // $this->call(AdmissionTable::class);
        // $this->call(AdmissionsTable::class);
        // $this->call(CompletionsTable::class);
        // Seed the Tags table
        // $this->call(TagsTableSeeder::class);
        // $this->command->info('Tags tables seeded!');

    }
}

// class TagsTableSeeder extends Seeder {

//     public function run()
//     {
//         DB::table('tags')->delete();
//         Tag::create([ 'name' => 'Athlete']);
//         Tag::create([ 'name' => 'First Generation']);
//         Tag::create([ 'name' => 'Graduate']);
//         Tag::create([ 'name' => 'International']);
//         Tag::create([ 'name' => 'Military & Veteran']);
//         Tag::create([ 'name' => 'Retention Risk']);
//         Tag::create([ 'name' => 'Scotts Scholar']);
//         Tag::create([ 'name' => 'Undergraduate']);
//     }
// }

