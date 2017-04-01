<?php

use Illuminate\Database\Seeder;
use App\PeerGroup;
use App\School;


class PeerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
       public function run()
        {
            DB::table('peergroups')->delete();
            PeerGroup::create([  'peergroup_id' => '1', 'user_id' => '1', 'peergroup_name' => 'DRU', 'private_public_flag' => 'public','created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);

            PeerGroup::create([  'peergroup_id' => '2', 'user_id' => '1', 'peergroup_name' => 'test', 'private_public_flag' => 'private','created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
            PeerGroup::create([  'peergroup_id' => '3', 'user_id' => '1', 'peergroup_name' => 'UNO Peers', 'private_public_flag' => 'public','created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        }
}

class PeerGroupSchoolTable extends Seeder 
{
        /**
             * Run the database seeds.
             *
             * @return void
             */
        public function run()
        {   

                   /*------------------------------------------------------*/
                     /**********************UNO Peers Schools Seeding*************/
                    /*----------------------------------------------------------*/


            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'The University of Texas at San Antonio')->first()->school_id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of North Carolina at Greensboro')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of North Carolina at Charlotte')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of North Florida')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of Missouri-St Louis')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);


            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'Wichita State University')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of Nebraska at Omaha')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);


            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of Missouri-Kansas City')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of Colorado Colorado Springs')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'Eastern Michigan University')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'Oakland University')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'The University of Tennessee-Chattanooga')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'Portland State University')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'Northern Kentucky University')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of Central Oklahoma')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'Indiana University-Purdue University-Indianapolis')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'The University of Texas at San Antonio')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'UNO Peers')->first()->peergroup_id;
            $school = School::where('name', '=', 'University of Arkansas at Little Rock')->first()->id;
             $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

                    /*------------------------------------------------------*/
                     /**********************DRU Peers Schools Seeding*************/
                    /*----------------------------------------------------------*/
         

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of Arkansas at Little Rock')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Azusa Pacific University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                        DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Biola University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                        DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of La Verne')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of the Pacific')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Pepperdine University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of San Diego')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of San Francisco')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Colorado Technical University-Colorado Springs')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of Northern Colorado')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Wilmington University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','American University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Barry University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Lynn University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Florida Agricultural and Mechanical University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Florida Institute of Technology')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','The University of West Florida')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Clark Atlanta University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Georgia Southern University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','DePaul University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Benedictine University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Illinois State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','National Louis University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Trinity International University-Illinois')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Indiana State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Spalding University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Bowie State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Morgan State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Worcester Polytechnic Institute')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Andrews University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Central Michigan University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Oakland University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=',"Saint Mary's University of Minnesota")->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of St Thomas')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Maryville University of Saint Louis')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of Nebraska at Omaha')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Seton Hall University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Adelphi University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Hofstra University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','The New School')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Pace University-New York')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Saint John Fisher College')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=',"St John's University-New York")->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','SUNY College of Environmental Science and Forestry')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','East Carolina University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','North Carolina A & T State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of North Carolina at Charlotte')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Ashland University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Union Institute & University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of Tulsa')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Immaculata University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Indiana University of Pennsylvania-Main Campus')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Widener University-Main Campus')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','South Carolina State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','East Tennessee State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Middle Tennessee State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Tennessee State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Trevecca Nazarene University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Texas A & M University-Corpus Christi')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Texas A & M University-Commerce')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Lamar University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Our Lady of the Lake University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of St Thomas')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Sam Houston State University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Texas A & M University-Kingsville')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Texas Christian University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Texas Southern University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=',"Texas Woman's University'")->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);


                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Cardinal Stritch University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);


                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Edgewood College')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);


                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Marquette University')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);


                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Pontifical Catholic University of Puerto Rico-Ponce')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);


                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Inter American University of Puerto Rico-Metro')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);


                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','University of Puerto Rico-Mayaguez')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);


                $peergroup = PeerGroup::where('peergroup_name', '=', 'DRU')->first()->peergroup_id;
                $school = School::where('name', '=','Universidad Del Turabo')->first()->id;
                $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
                      DB::table('peergroup_school')->insert($peergroup_school);

                    /*------------------------------------------------------*/
                     /**********************TEST Peers Schools Seeding*************/
                    /*----------------------------------------------------------*/

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Academy of Art University')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Art Center College of Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','California College of the Arts')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Fashion Institute of Design & Merchandising-Los Angeles')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of California-Argosy University San Diego')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of California-Argosy University San Francisco')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Musicians Institute')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Otis College of Art and Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Colorado')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Fort Lauderdale')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','AI Miami International University of Art and Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Ringling College of Art and Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Atlanta')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Savannah College of Art and Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','School of the Art Institute of Chicago')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Illinois Institute of Art-Chicago')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Maryland Institute College of Art')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Berklee College of Music')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Massachusetts College of Art and Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The New England Institute of Art')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','College for Creative Studies')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institutes International-Minnesota')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Las Vegas')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Pratt Institute-Main')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','School of Visual Arts')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Columbus College of Art and Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Portland')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Philadelphia')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Pittsburgh')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The University of the Arts')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','Rhode Island School of Design')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Houston')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','South University-The Art Institute of Dallas')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Seattle')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of California-Argosy University Hollywood')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Illinois Institute of Art-Schaumburg')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Phoenix')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of California-Argosy University Los Angeles')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Washington')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of California-Argosy University Orange County')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

            $peergroup = PeerGroup::where('peergroup_name', '=', 'test')->first()->peergroup_id;
            $school = School::where('name', '=','The Art Institute of Pittsburgh-Online Division')->first()->id;
            $peergroup_school = [ ['peergroup_id' => $peergroup, 'school_id' => $school, 'created_by' => 'System', 'updated_by' => 'System' ] ];
            DB::table('peergroup_school')->insert($peergroup_school);

      }
 }
