<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserManagementEditTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

  	//correct email and password
	public function testUserManagementEdit()
    {
        $this->browse(function (Browser $browser) {
				
			$browser->visit('/unoistoie-acbat/public/home')
				->click('#login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
				->assertSee('Welcome Administrator')
				->click('#administration')
				->click('#users')
				->assertSee('User')
				->click('#email')
				->assertSee('Edit User')
				->type('email','anson12')
				->click('.btn-primary') //email with missing @
				->type('email','anson12@')
				->click('.btn-primary') //email with missing .
				->type('email','anson502@gmail.com')
				->click('.btn-primary')//valid email
				//->check('active') // click agree button
				->click('.btn-primary');						
	        });
    }
}


