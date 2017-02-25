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
	
	public function testUserLogin()
	{
		$this->browse(function (Browser $browser) 
		{	
		$browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative')
				->click('#login')
				->click('.btn-primary') //no email entered
				->type('email','anson12')
				->click('.btn-primary') //email with missing @
				->type('email','anson12@')
				->click('.btn-primary') //email with missing .
				->type('email','anson127@gmail.com')
				->click('.btn-primary') //valid email
				->type('password','')
				->click('.btn-primary') //blank password
				->type('password','123')
				->click('.btn-primary')  //wrong password
				->type('password','123456')
				->click('.btn-primary') //correct password
			    ->assertSee('Home')
				->click('#dropdown-menu')
				->click('#logout-button')
				->assertDontSee('Home')->pause(2000);
				
			 			
        });
	
	}
}