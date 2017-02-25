<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterationTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
  	//correct email and password

	
	//successful register
	
	public function testUserRegister()
	{
		$this->browse(function (Browser $browser) 
		{	//REGISTERATION
		$browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative')
				->click('#register')
				->click('#registerBtn') //no email entered
				->type('email','anson12')
				->click('#registerBtn') //email with missing @
				->type('email','anson12@')
				->click('#registerBtn') //email with missing .
				->type('email','anson127@gmail.com')
				->click('#registerBtn') //valid email
				->type('password','')
				->type('password_confirmation','') 
				->click('#registerBtn')// password and confirm password blank
				->type('password','123')
				->type('password_confirmation','') 
				->click('#registerBtn')// empty confirm password
				->type('password','')
				->type('password_confirmation','123') 
				->click('#registerBtn')// empty password
				->type('password','123')
				->type('password_confirmation','123') 
				->click('#registerBtn')// less than six characters
				->type('password','123456')
				->type('password_confirmation','1234567') 
				->click('#registerBtn')// password and confirm password mismatch
				->type('password','123456')
				->type('password_confirmation','123456') 
				->click('#registerBtn')// correct password and confirm password
				->check('agree') // click agree button
				->click('#registerBtn')
				->assertSee('Welcome user !')
				->click('#dropdown-menu')
				->click('#logout-button')
				->assertDontSee('Home')->pause(2000);       
				
        });
	
	}
}