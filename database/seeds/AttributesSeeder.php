<?php

use Illuminate\Database\Seeder;

use App\Instcat;
use App\Stabbr;
use App\Carnegie;

class InstcatSeeder extends Seeder
{
    // INSTCAT column (Schools table "Inst_Catgry") - all options
    public function run()
    {
        DB::table('instcats')->delete();
        Instcat::create([  'id' => '0', 'desc' => 'All', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '1', 'desc' => 'Degree-granting, graduate with no undergraduate degrees', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '2', 'desc' => 'Degree-granting, primarily baccalaureate or above', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '3', 'desc' => 'Degree-granting, not primarily baccalaureate or above', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '4', 'desc' => 'Degree-granting, associate\'s and certificates', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '5', 'desc' => 'Nondegree-granting, above the baccalaureate', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '6', 'desc' => 'Nondegree-granting, sub-baccalaureate', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '-1', 'desc' => 'Not reported', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Instcat::create([  'id' => '-2', 'desc' => 'Not applicable', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}


class StabbrSeeder extends Seeder
{
    // STABBR column (Schools table "School_State") - all options
    public function run()
    {
        DB::table('stabbrs')->delete();
        Stabbr::create([  'id' => '0', 'desc' => 'All', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'AL', 'desc' => 'Alabama', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'Ak', 'desc' => 'Alaska', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'AZ', 'desc' => 'Arizona', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'AR', 'desc' => 'Arkansas', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'CA', 'desc' => 'California', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'CO', 'desc' => 'Colorado', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'CT', 'desc' => 'Connecticut', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'DE', 'desc' => 'Delaware', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'DC', 'desc' => 'District of Columbia', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'FL', 'desc' => 'Florida', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'GA', 'desc' => 'Georgia', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'HI', 'desc' => 'Hawaii', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'ID', 'desc' => 'Idaho', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'IL', 'desc' => 'Illinois', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'IN', 'desc' => 'Indiana', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'IA', 'desc' => 'Iowa', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'KS', 'desc' => 'Kansas', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'KY', 'desc' => 'Kentucky', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'LA', 'desc' => 'Louisiana', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'ME', 'desc' => 'Maine', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MD', 'desc' => 'Maryland', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MA', 'desc' => 'Massachusetts', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MI', 'desc' => 'Michigan', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MN', 'desc' => 'Minnesota', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MS', 'desc' => 'Mississippi', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MO', 'desc' => 'Missouri', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MT', 'desc' => 'Montana', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'NE', 'desc' => 'Nebraska', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'NV', 'desc' => 'Nevada', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'NH', 'desc' => 'New Hampshire', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'NJ', 'desc' => 'New Jersey', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'NM', 'desc' => 'New Mexico', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'NY', 'desc' => 'New York', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'NC', 'desc' => 'North Carolina', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'ND', 'desc' => 'North Dakota', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'OH', 'desc' => 'Ohio', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'OK', 'desc' => 'Oklahoma', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'OR', 'desc' => 'Oregon', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'PA', 'desc' => 'Pennsylvania', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'RI', 'desc' => 'Rhode Island', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'SC', 'desc' => 'South Carolina', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'SD', 'desc' => 'South Dakota', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'TN', 'desc' => 'Tennessee', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'TX', 'desc' => 'Texas', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'UT', 'desc' => 'Utah', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'VT', 'desc' => 'Vermont', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'VA', 'desc' => 'Virginia', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'WA', 'desc' => 'Washington', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'WV', 'desc' => 'West Virginia', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'WI', 'desc' => 'Wisconsin', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'WY', 'desc' => 'Wyoming', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'AS', 'desc' => 'American Samoa', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'FM', 'desc' => 'Federated States of Micronesia', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'GU', 'desc' => 'Guam', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MH', 'desc' => 'Marshall Islands', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'MP', 'desc' => 'Northern Marianas', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'PW', 'desc' => 'Palau', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'PR', 'desc' => 'Puerto Rico', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Stabbr::create([  'id' => 'VI', 'desc' => 'Virgin Islands', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class CarnegieSeeder extends Seeder
{
    // Carnegie column (Carnegie Classifications table "Cng_2000") - all options
    public function run()
    {
        DB::table('carnegies')->delete();
        Carnegie::create([  'id' => '0', 'desc' => 'All', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '15', 'desc' => 'Doctoral/Research Universities--Extensive', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '16', 'desc' => 'Doctoral/Research Universities--Intensive', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '21', 'desc' => 'Masters Colleges and Universities I', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '22', 'desc' => 'Masters Colleges and Universities II', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '31', 'desc' => 'Baccalaureate Colleges--Liberal Arts', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '32', 'desc' => 'Baccalaureate Colleges--General', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '33', 'desc' => 'Baccalaureate/Associates Colleges', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '40', 'desc' => 'Associates Colleges', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '51', 'desc' => 'Theological seminaries and other specialized faith-related institutions', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '52', 'desc' => 'Medical schools and medical centers', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '53', 'desc' => 'Other separate health profession schools', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '54', 'desc' => 'Schools of engineering and technology', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '55', 'desc' => 'Schools of business and management', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '56', 'desc' => 'Schools of art, music, and design', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '57', 'desc' => 'Schools of law', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '58', 'desc' => 'Teachers colleges', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '59', 'desc' => 'Other specialized institutions', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '60', 'desc' => 'Tribal colleges', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Carnegie::create([  'id' => '-3', 'desc' => 'Not available', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

