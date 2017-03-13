<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
  	//correct email and password

	
	//successful register
	
	public function testUserStatistics()
	{
		$this->browse(function (Browser $browser) 
		{	
		$browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative')
				->click('#login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary') //Admin Login
			    ->assertSee('Home')
				->click('#UserStatistics') //Checks Stats
				->pause(4000)
				->click('#dropdown-menu')
				->click('#logout-button')   //Admin Logout
				->pause(500)
				->click('#register')        //new user registered  
				->type('email','Ason66@gmail.com')
				->type('password','123456')
				->type('password_confirmation','123456')
				->check('agree')
				->click('#registerBtn')
				->click('#dropdown-menu')
				->click('#logout-button') 
				->pause(500)
				->click('#login')      //Admin Login
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary') 
			    ->assertSee('Home')
				->click('#UserStatistics')      //Checks Updated Stats
				->pause(7000)
				->click('#administration')   //Create new Active-user form Admin page
			    ->click('#users')
				->click('.btn-primary')
				->assertSee('New User')
				->type('email','anson705@gmail.com')
				->check('active') 
				->pause(7000)
				->type('password','123456')
				->type('password_confirmation','123456')
				->click('.btn-primary')
				->pause(3000)
				->click('#UserStatistics') //Checks Stats
				->pause(9000)
				->click('#administration')   //Create new Inactive-user form Admin page
			    ->click('#users')
				->click('.btn-primary')
				->assertSee('New User')
				->type('email','anson607@gmail.com')
				->select('affiliation','Affiliation-2') 
				->pause(9000)
				->type('password','123456')
				->type('password_confirmation','123456')
				->click('.btn-primary')
				->pause(3000)
				->click('#UserStatistics') //Checks Stats
				->pause(9000)
				->click('#administration')  //Delete User
				->click('#users')
				->assertSee('User')
				->click('#email')
				->assertSee('Edit User')
				->click('.btn-default')
				->pause(3000)
				->click('#UserStatistics') //Checks Stats
				->pause(7000)
				->click('#dropdown-menu')
				->click('#logout-button');   //Admin Logout
				
			 			
        });
	
	}
}