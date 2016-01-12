<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test user can register traditionally.
     *
     * @return void
     */
    public function testTraditionalRegistartion()
    {
        $this->visit('auth/register')
             ->type('Atea Nazhrah', 'name')
             ->type('ateaN@example.com', 'email')
             ->type('testing', 'password')
             ->type('testing', 'confirm-password')
             ->press('Register')
             ->seePageIs('/dashboard');
    }

    /**
     * Test user can login traditionally.
     *
     * @return void
     */
    public function testTraditionalLogin()
    {
        factory(Soma\User::class)->create([
            'email' => 'aloraleigh@example.com',
            'password' => bcrypt('testing'),
        ]);

        $this->visit('auth/login')
             ->type('aloraleigh@example.com', 'email')
             ->type('testing', 'password')
             ->press('Log In')
             ->seePageIs('/dashboard');
    }
}
