<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserManagementdeleteTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

  	//correct email and password
	public function testUserManagementDelete()
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
				->click('.btn-default');
	        });
    }
}




