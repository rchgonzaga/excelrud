<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
    }

    public function testLogout()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/')
            ->click($user->name)
            ->click('Logout')
            ->seePageIs('/login');

        $this->assertTrue(true);
    }
}
