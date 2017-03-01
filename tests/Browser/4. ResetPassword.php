<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ResetPasswordTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
  	//correct email and password

	
	//successful register
	
	public function testUserResetPassword()
	{
		$this->browse(function (Browser $browser) 
		{	
		$browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative')
				->click('#login')
			 	->click('.btn-link')
			    ->assertSee('Reset')
				->type('email','invalid@outlook.com')
				->click('.btn-primary') // invalid email address
				->type('email','capstone003test@gmail.com')
				->click('.btn-primary') // valid email address
				->visit('https://www.google.com/gmail/')
				->type('Email','capstone003test@gmail.com')
				->click('#next')
				->type('Passwd','Testing123')
				->click('#signIn');
				
				
			//Part 2 reset password
			/*	->visit('http://localhost/unoistoie-acbat/public/password/reset/d02f7418a634d2a3153a193cd3c7c93c1283c67eb857b3d307db5117f53053cd')
				->assertSee('Reset')
				->type('email','dsouza_anson@outlook.com')
				->type('password','123456')
				->type('password_confirmation','123456')
				->click('.btn-primary')// invalid email	
				->assertSee('Home')
				->click('#user-dropdown-menu')
				->click('#logout-button')
				->assertSee('Administrative')
				->visit('/unoistoie-acbat/public/')
				->assertDontSee('Home')->pause(2000);
			//->assertSee('Reset')*/
				
        });
	
	}
}