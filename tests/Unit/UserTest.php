<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testFullName()
    {
        $user = new User();
        $user->first_name = 'John';
        $user->last_name = 'Doe';

        $this->assertEquals('John Doe', $user->fullName());

        $user->middle_name = 'Middle';
        $this->assertEquals('John Middle Doe', $user->fullName());
    }
}
