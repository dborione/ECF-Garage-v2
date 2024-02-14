<?php

namespace App\Tests;

use App\Entity\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $employee = new Employee();

        $employee->setEmail('true@test.com');
        $employee->setPassword('password');

        $this->assertTrue($employee->getEmail() === 'true@test.com');
        $this->assertTrue($employee->getPassword() === 'password');
    }

    public function testIsFalse()
    {
        $employee = new Employee();

        $employee->setEmail('true@test.com');
        $employee->setPassword('password');

        $this->assertFalse($employee->getEmail() === 'false@test.com');
        $this->assertFalse($employee->getPassword() === 'false');
    }

    public function testIsEmpty()
    {
        $employee = new Employee();

        $this->assertEmpty($employee->getEmail());
        // $this->assertEmpty($employee->getPassword());
    }
}
