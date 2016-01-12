<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test the auth/login route is accessible.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->call('GET', 'auth/login');
        $this->assertResponseStatus(200);
    }

    /**
     * Test the auth/register route is accessible.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->call('GET', 'auth/register');
        $this->assertResponseStatus(200);
    }

    /**
     * Test the dashboard route is accessible.
     *
     * @return void
     */
    public function testDashboard()
    {
        $this->call('GET', 'dashboard');
        $this->assertResponseStatus(302);
    }
}
