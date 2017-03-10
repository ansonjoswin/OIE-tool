<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AutomatedTesting extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
  	
	// Naviage to landing lage
	public function LandingPage()
	{
		$this->browse(function (Browser $browser) 
		{	//REGISTERATION
		$browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative');
		});
	}
}

class AutomatedTesting1 extends DuskTestCase
{	
	public function RegisterForm()
	{
	   	function LandingPage()
			{
			->click('#register');
			});
	}
}