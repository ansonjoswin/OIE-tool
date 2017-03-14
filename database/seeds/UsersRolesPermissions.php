<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create([  'name' => 'Administrator', 'password' => bcrypt('secret'), 'email' => 'oieadmin@unomaha.edu', 'affiliation' => 'Higher Education', 'active' => true,
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

        User::create([  'name' => 'Sachin Pawaskar', 'password' => bcrypt('secret'), 'email' => 'spawaskar@unomaha.edu','affiliation' => 'Higher Education', 'active' => false,

            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        User::create([  'name' => 'Hank Robinson', 'password' => bcrypt('secret'), 'email' => 'trobinson@unomaha.edu','affiliation' => 'Higher Education', 'active' => true,
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        User::create([  'name' => 'Lindsey Bandow', 'password' => bcrypt('secret'), 'email' => 'lbandow@unomaha.edu', 'affiliation' => 'Higher Education','active' => true,
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();
        Role::create([ 'name' => 'admin', 'display_name' => 'Administrator', 'description' => 'Admin is allowed to manage and edit other users',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Role::create([ 'name' => 'user', 'display_name' => 'Registered User', 'description' => 'User of webpage who is external to UNO.',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();
        Permission::create([ 'name' => 'manage-users', 'display_name' => 'Manage Users', 'description' => 'User is allowed to add, edit and delete other users',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Permission::create([ 'name' => 'manage-roles', 'display_name' => 'Manage Roles', 'description' => 'User is allowed to add, edit and delete roles',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Permission::create([ 'name' => 'readonly-all', 'display_name' => 'Readonly', 'description' => 'User is allowed to read only access to ...',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class RoleUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role_user')->delete();

        $user = User::where('name', '=', 'Administrator')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ ['role_id' => $role, 'User_ID' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

        $user = User::where('name', '=', 'Sachin Pawaskar')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ ['role_id' => $role, 'User_ID' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

        $user = User::where('name', '=', 'Hank Robinson')->first()->id;

        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create() ] ];
        DB::table('role_user')->insert($role_user);

        $user = User::where('name', '=', 'Lindsey Bandow')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ 'role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()  ];

        DB::table('role_user')->insert($role_user);
    }
}

class UsersRolesPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUsers = Permission::where('name', '=', 'manage-users')->first();
        $manageRoles = Permission::where('name', '=', 'manage-roles')->first();
        $readonlyAll = Permission::where('name', '=', 'readonly-all')->first();

        $adminRole = Role::where('name', '=', 'admin')->first();
        $adminRole->attachPermissions(array($manageUsers, $manageRoles));


        // $studentRole = Role::where('name', '=', 'staff')->first();
        // $studentRole->attachPermissions(array($readonlyAll));

    }
}

// class DataTable extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         DB::table('datatable')->delete();
//           // $datatable = new DataTable(); 
//           //   $datatable ->ug_headcount = '1';
//           //   $datatable ->admin_count = '1';
//           //   $datatable ->inst_count = '1';
//           //   $datatable ->admin_sal = '1';
//           //   $datatable ->inst_sal = '1';
//           //   $datatable ->admin_stu = '1';
//           //   $datatable ->inst_stu = '1';
//           //   $datatable ->grad_rate4 = '1';
//           //   $datatable ->grad_rate6 = '1';
//           //   $datatable ->deg_stu= '1';
//           //   $datatable ->avg_sch_stu = '1';
//           //   $datatable ->loan_rate = '1';

//             // ]); 
//         DataTable::create([  
//             'ug_headcount' => '2',
//             'admin_count' => '2',
//             'inst_count' => '2',
//             'admin_sal' => '2',
//             'inst_sal' => '2',
//             'admin_stu' => '2',
//             'inst_stu' => '2',
//             'grad_rate4' => '2',
//             'grad_rate6' => '2',
//             'deg_stu' => '2',
//             'avg_sch_stu' => '2',
//             'loan_rate' => '2',

//             ]); 

// // DataTable::create([  
// //             'ug_headcount' => '3',
// //             'admin_count' => '3',
// //             'inst_count' => '3',
// //             'admin_sal' => '3',
// //             'inst_sal' => '3',
// //             'admin_stu' => '3',
// //             'inst_stu' => '3',
// //             'grad_rate4' => '3',
// //             'grad_rate6' => '3',
// //             'deg_stu' => '3',
// //             'avg_sch_stu' => '3',
// //             'loan_rate' => '3',

// //             ]); 
// // DataTable::create([  
// //             'ug_headcount' => '4',
// //             'admin_count' => '4',
// //             'inst_count' => '4',
// //             'admin_sal' => '4',
// //             'inst_sal' => '4',
// //             'admin_stu' => '4',
// //             'inst_stu' => '4',
// //             'grad_rate4' => '4',
// //             'grad_rate6' => '4',
// //             'deg_stu' => '4',
// //             'avg_sch_stu' => '4',
// //             'loan_rate' => '4',

// //             ]);
// // DataTable::create([  
// //             'ug_headcount' => '5',
// //             'admin_count' => '5',
// //             'inst_count' => '5',
// //             'admin_sal' => '5',
// //             'inst_sal' => '5',
// //             'admin_stu' => '5',
// //             'inst_stu' => '5',
// //             'grad_rate4' => '5',
// //             'grad_rate6' => '5',
// //             'deg_stu' => '5',
// //             'avg_sch_stu' => '5',
// //             'loan_rate' => '5',

// //             ]);
// // DataTable::create([  
// //             'ug_headcount' => '6',
// //             'admin_count' => '6',
// //             'inst_count' => '6',
// //             'admin_sal' => '6',
// //             'inst_sal' => '6',
// //             'admin_stu' => '6',
// //             'inst_stu' => '6',
// //             'grad_rate4' => '6',
// //             'grad_rate6' => '6',
// //             'deg_stu' => '6',
// //             'avg_sch_stu' => '6',
// //             'loan_rate' => '6',

//             // ]);



//     }
// }


