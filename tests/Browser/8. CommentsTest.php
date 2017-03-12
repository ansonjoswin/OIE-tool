<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
  	//correct email and password

	
	//successful register
	
	public function testUserComments()
	{
		$this->browse(function (Browser $browser) 
		{	
			$browser->visit('/unoistoie-acbat/public/')
				->assertSee('Administrative')
				->click('#login')
				//Registered user view
				->type('email','anson1@gmail.com')
				->type('password','123456')
				->click('.btn-primary') //correct password
			    ->type('comment_text','New one')
				->click('.btn-primary')
				->click('#dropdown-menu')
				->click('#logout-button')
				->assertDontSee('Home')->pause(2000)
				//Admin checking user comment view
				->click('#login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary') //correct password
			    ->assertSee('Home')
				->click('#administration')
			    ->click('#comments')
				//publish the comment
				->click('.btn-success')
				->click('#dropdown-menu')
				->click('#logout-button')
				->assertDontSee('Home')->pause(2000)
				//User view - checking for published comment once published by admin
				->click('#login')
				//Registered user view
				->type('email','anson1@gmail.com')
				->type('password','123456')
				->click('.btn-primary')
				->pause(10000)
				->click('#dropdown-menu')
				->click('#logout-button')
				->click('#login')
				->type('email','oieadmin@unomaha.edu')
				->type('password','secret')
				->click('.btn-primary')
				->click('#administration')
			    ->click('#comments')
				->click('.btn-default')
				//manual intervention for delete popup
				->waitForText('Comment successfully deleted!')
				->click('#dropdown-menu')
				->click('#logout-button')
				->click('#login')
				->type('email','anson1@gmail.com')
				->type('password','123456')
				->click('.btn-primary')
				->pause(10000); //verify comment got deleted
				
				
				
				
        });
	}
}