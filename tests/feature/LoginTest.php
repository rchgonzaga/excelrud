<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        factory(App\User::class)->create([
            'email' => 'test@test.com',
            'password' => Hash::make('secret')
        ]);
    }

    public function testLoginSuccess()
    {
        $this->visit('/')
            ->type('test@test.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/import');
    }

    public function testLoginWrongEmail()
    {
        $this->visit('/')
            ->type('test2@test.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/login');
    }

    public function testLoginWrongPassword()
    {
        $this->visit('/')
            ->type('test@test.com', 'email')
            ->type('secret2', 'password')
            ->press('Login')
            ->seePageIs('/login');
    }
}
