<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->visit('/register')
            ->type('test', 'name')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation');
    }

    public function testRegisterSuccess()
    {
        $this->type('test2@test.com', 'email')
            ->press('Register')
            ->seePageIs('/import');
    }

    public function testRegisterEmailExists()
    {
        $user = factory(App\User::class)->create();

        $this->type($user->email, 'email')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The email has already been taken.');
    }

    public function testRegisterInvalidPassword()
    {
        $this->type('test2@test.com', 'email')
            ->type('s', 'password')
            ->press('Register')
            ->seePageIs('/register')
            ->see('The password must be at least 6 characters.');
    }
}
