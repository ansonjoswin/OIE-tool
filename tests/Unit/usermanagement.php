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
	public function testBasicLogin()
    {
        $this->browse(function (Browser $browser) {
				
				//successful create user
                $browser->visit('/unoistoie-acbat/public/login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
			    ->assertSee('Home')
				->click('#dropdown-menu-admin')
				->click('#user')
				->click('.btn-primary')
				->type('email','version50@gmail.com')
				->select('affiliation','Affiliation-1')
				->check('active')
				->select('Roles','roles-1')
				->type('password','secret')
				->type('password_confirmation','secret')
				->click('.btn-primary')
				->click('#user-dropdown-menu')
				->click('#user-dropdown-menu')
				->click('#logout-button')
				->assertSee('Administrative')
				->visit('/unoistoie-acbat/public/')
				->assertDontSee('Home')->pause(2000);
				
				//create user validations
				$browser->visit('/unoistoie-acbat/public/login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
			    ->assertSee('Home')
				->click('#dropdown-menu-admin')
				->click('#user')
				->click('.btn-primary')
				->click('.btn-primary')
				->assertSee('Please fill out this field')
				->type('email','version50@gmail.com')
				->assertSee('Please select an item in this list')
				->click('.btn-primary')
				->select('affiliation','Affiliation-1')
				->select('Roles','roles-1')
				->click('.btn-primary')
				->assertSee('The password filed is required')
				->type('password','secret')
				->click('.btn-primary')
				->assertSee('The password combination does not match')
				->type('password','secret')
				->type('password_confirmation','secret2')
				->click('.btn-primary')
				->assertSee('The password combination does not match')
				->type('password','secret')
				->type('password_confirmation','secret2')
				->click('.btn-primary')
				->assertSee('User successfully added')
				->click('#user-dropdown-menu')
				->click('#user-dropdown-menu')
				->click('#logout-button')
				->assertSee('Administrative')
				->visit('/unoistoie-acbat/public/')
				->assertDontSee('Home')->pause(2000);
				
				//editing user validations


				
        });
    }
}


