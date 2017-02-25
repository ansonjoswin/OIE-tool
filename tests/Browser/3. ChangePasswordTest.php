<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChangePasswordTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
  	//correct email and password

	
	//successful register
	
	public function testUserChangePassword()
	{
		$this->browse(function (Browser $browser) 
		{	
		$browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative')
				->click('#login')
				->type('email','anson127@gmail.com')
				->type('password','1234567')
				->click('.btn-primary')
			    ->assertSee('Home')
				->click('#dropdown-menu')
				->click('#change-password')
				->type('oldpassword','')
				->type('password','12345678')
				->type('password_confirmation','12345678')
				->click('#updatePasswordBtn')//old password blank
				->type('oldpassword','1234567')
				->type('password','')
				->type('password_confirmation','12345678')
				->click('#updatePasswordBtn')//password blank
				->click('#updatePasswordBtn')
				->type('oldpassword','1234567')
				->type('password','12345678')
				->type('password_confirmation','')
				->click('#updatePasswordBtn')//confirm password blank
				->type('oldpassword','12345')
				->type('password','12345678')
				->type('password_confirmation','12345678') // wrong old password
				->click('#updatePasswordBtn')
				->click('#dropdown-menu')
				->click('#change-password')
				->type('oldpassword','1234567')
				->type('password','12345678')
				->type('password_confirmation','12345678')
				->click('#updatePasswordBtn')// All data valid
				->assertSee('Home')
				->click('#dropdown-menu')
				->click('#logout-button')
				->assertSee('Administrative')
				->visit('/unoistoie-acbat/public/')
				->assertDontSee('Home')->pause(2000)
				->click('#login')
				->type('email','anson127@gmail.com')
				->click('.btn-primary') //valid email
				->type('password','12345678')
				->click('.btn-primary') //correct password
			    ->click('#dropdown-menu')
				->click('#logout-button')
				->assertDontSee('Home')->pause(2000);
			});
	
	}
}