<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserManagementCreateTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

  	//correct email and password
	public function testUserManagementCreate()
    {
        $this->browse(function (Browser $browser) {
				
				//successful create user
                $browser->visit('/unoistoie-acbat/public/login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
				->assertSee('Welcome Administrator')
				->click('#administration')
			    ->click('#users')
				->click('.btn-primary')
				->assertSee('New User')
				->click('.btn-primary')// all fields blank
				->type('email','anson12@')
				->click('.btn-primary')// invalid email
				->type('email','anson211@gmail.com')
				->click('.btn-primary')// valid email
				->select('affiliation','')
				->click('.btn-primary')// no affiliation
				->select('affiliation','Affiliation-2')
				->click('.btn-primary') // correct affiliation
				->check('active') 
				->click('.btn-primary')// click agree button
				->type('password','123456')
				->click('.btn-primary')//only password entered, confirmed password left blank
				->type('password','12345')
				->click('.btn-primary') // password less than 6 characters
				->type('password','123456')
				->type('password_confirmation','123456')
				->click('.btn-primary');// valid passwords
				//->assertSee('Users');													
	        });
    }
}


