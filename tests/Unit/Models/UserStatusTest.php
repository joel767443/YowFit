<?php

namespace Tests\Unit\Models;

use Tests\TestCase;

/**
 * Class UserStatusTest
 */
class UserStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
