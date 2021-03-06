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
            $browser->visit('/unoistoie-acbat/public/login')
				->type('email','ajdsouza@unomaha.edu')
				->type('password','123456')
				->click('.btn-primary')
			    ->assertSee('Home');
        });
    }

	public function testUserLogout()
	{
		$this->browse(function (Browser $browser) {
            $browser->visit('/unoistoie-acbat/public/home')
				->assertSee('Home')
				->click('#user-dropdown-menu')
				->click('#logout-button')
				->assertSee('Administrative')
				->visit('/unoistoie-acbat/public/')
				->assertDontSee('Home')->pause(2000);
        });
	}
	
	//successful register
	
	public function testUserRegister()
	{
		$this->browse(function (Browser $browser) {
            $browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative')
				->click('#register')
				->assertSee('Register')
				->type('email','version24@gmail.com')
				->select('.Affiliation','Affiliation-1')
				->type('password','123456')
				->type('password_confirmation','123456')
				->click('#agree')
				->click('#registerBtn')
				->assertSee('Home')
				->visit('/unoistoie-acbat/public/home');	
        });
	}
	
	
	
	public function testUserChangePassword()
	{
		$this->browse(function (Browser $browser) {
            $browser->visit('/unoistoie-acbat/public/login')
				->type('email','version22@gmail.com')
				->type('password','1234567')
				->click('.btn-primary')
			    ->assertSee('Home')
				->click('#user-dropdown-menu')
				->click('#change-password')
				->type('oldpassword','1234567')
				->type('password','12345678')
				->type('password_confirmation','12345678')
				->click('#updatePasswordBtn')
				->assertSee('Home')
				->click('#user-dropdown-menu')
				->click('#logout-button')
				->assertSee('Administrative')
				->visit('/unoistoie-acbat/public/')
				->assertDontSee('Home')->pause(2000);
				
        });
	}
	
	/*public function testBasicLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/unoistoie-acbat/public/login')
				->type('email','version22@gmail.com')
				->type('password','12345678')
				->click('.btn-primary')
			    ->assertSee('Home');
        });
    }
}*/

public function testUserResetPassword1()
	{
		$this->browse(function (Browser $browser) {
            $browser->visit('/unoistoie-acbat/public/login')
				->click('.btn-link')
			    ->assertSee('Reset')
				->type('email','dsouza_anson@outlook.com')
				->click('.btn-primary');								
        });
	}
	
public function testUserResetPassword2()
	{
		$this->browse(function (Browser $browser) {
            $browser->visit('http://localhost/unoistoie-acbat/public/password/reset/2a4026b816722b8f8acdb6af9fdb97277a004ff909bbd5e065be3f9e8e8fbacf')
			//->assertSee('Reset')
			->type('email','dsouza_anson@outlook.com')
			->type('password','12345678')	
			->type('password_confirmation','12345678')
			->click('.btn-primary')
			->assertSee('Home')
			->click('#user-dropdown-menu')
			->click('#logout-button')
			->assertSee('Administrative')
			->visit('/unoistoie-acbat/public/')
			->assertDontSee('Home')->pause(2000);		
        });
	}
}
