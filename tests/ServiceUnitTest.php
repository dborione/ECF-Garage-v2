<?php

namespace App\Tests;

use App\Entity\Service;
use PHPUnit\Framework\TestCase;

class ServiceUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $service = new Service();

        $service->setName('true');
        $service->setDescription('true');

        $this->assertTrue($service->getName() === 'true');
        $this->assertTrue($service->getDescription() === 'true');
    }

    public function testIsFalse()
    {
        $service = new Service();

        $service->setName('true');
        $service->setDescription('true');

        $this->assertFalse($service->getName() === 'false');
        $this->assertFalse($service->getDescription() === 'false');
    }

    public function testIsEmpty()
    {
        $service = new Service();

        $this->assertEmpty($service->getName());
        $this->assertEmpty($service->getDescription());
    }
}
