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
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('unoistoie-acbat');
        });
    }
	
	public function testBasicLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/unoistoie-acbat/public/login')
				->type('email','ajdsouza@unomaha.edu')
				->type('password','nEWUSER@123')
				->click('.btn-primary')
			    ->assertSee('Dashboard');
        });
    }
	
	
}

