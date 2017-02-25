<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
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
				/*->assertSee('Administrative')
				->click('#register')
				->click('#registerBtn') //no email entered
				->type('email','anson12')
				->click('#registerBtn') //email with missing @
				->type('email','anson12@')
				->click('#registerBtn') //email with missing .
				->type('email','anson12@gmail.com')
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
				->assertDontSee('Home')->pause(2000)

              // LOGIN
			  
				->click('#login')
				->click('.btn-primary') //no email entered
				->type('email','anson12')
				->click('.btn-primary') //email with missing @
				->type('email','anson12@')
				->click('.btn-primary') //email with missing .
				->type('email','anson12@gmail.com')
				->click('.btn-primary') //valid email
				->type('password','')
				->click('.btn-primary') //blank password
				->type('password','123')
				->click('.btn-primary')  // wrong password
				->type('password','123456')
				->click('.btn-primary')
			    ->assertSee('Home')
				->click('#dropdown-menu')
				->click('#logout-button')
				->assertDontSee('Home')->pause(2000);*/
				
				
				
              // USER MANAGEMENT
				/*->click('#login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
				->assertSee('Welcome Administrator')
				->click('#Administration')
				->click('#Users')
				->click('.btn-primary')
				->assertSee('New User')
				->type('email','123')
				->click('.btn-primary')
				->type('email','anson12@')
				->click('.btn-primary')
				->type('email','anson120@gmail.com')
				->click('.btn-primary')
				->select('affiliation','')
				->click('.btn-primary')
				->select('affiliation','Affiliation-2')
				->click('.btn-primary')
				->check('active') // click agree button
				->click('.btn-primary')
				->select('Roles','Advisor')
				->type('password','12345')
				->click('.btn-primary')
				->type('password','')
				->click('.btn-primary')
				->type('password','123456')
				->type('password_confirmation','')
				->click('.btn-primary')
				->type('password','123456')
				->type('password_confirmation','123456')
				->click('.btn-primary');*/
				
				
				
				
				
				
				
				//edit user
				
				/*->click('#login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
				->assertSee('Welcome Administrator')
				->click('#Administration')
				->click('#Users')
				->assertSee('User')
				->click('#email')
				->assertSee('Edit User')
				->type('email','anson12')
				->click('.btn-primary') //email with missing @
				->type('email','anson12@')
				->click('.btn-primary') //email with missing .
				->type('email','son101@gmail.com')
				->check('active') // click agree button
				->click('.btn-primary')
				->assertSee('Users')*/// correct password and confirm password
				
				//Delete user
				->click('#login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
				->assertSee('Welcome Administrator')
				->click('#Administration')
				->click('#Users')
				->assertSee('User')
				->click('#email')
				->assertSee('Edit User')
				->click('.btn-default')
				
				
				->whenAvailable('.modal', function ($modal) {
				$modal->assertSee('delete?')
				->press('OK');
					});
				
				
        });
	
	}
}