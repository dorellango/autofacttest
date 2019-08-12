<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_knows_if_is_a_admin()
    {
        $admin = factory(User::class)->create(['is_admin' => true]);
        $basic = factory(User::class)->create();

        $this->assertTrue($admin->isAdmin());
        $this->assertFalse($basic->isAdmin());
    }
}
