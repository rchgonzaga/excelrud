<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(App\User::class)->create();
        $this->actingAs($this->user)
            ->visit('user/' . $this->user->id . '/edit');
    }

    public function testUpdateProfileSuccess()
    {

        $newName = $this->user->name . '_name';

        $this->type($newName, 'name')
            ->press('Update')
            ->see('Profile updated');
    }

    public function testUpdateProfileFail()
    {
        $this->type('', 'name')
            ->press('Update')
            ->dontSee('Profile updated');
    }
}
