<?php

class DashboardTest extends TestCase
{
    public function testDashboardRedirectAsGuest()
    {
        $this->visit('/import')
            ->seePageIs('/login');
    }
}
