<?php

namespace App\Tests;

use App\Entity\Car;
use PHPUnit\Framework\TestCase;

class CarUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $car = new Car();

        $car->setPrice('8000');
        $car->setImage('file');
        $car->setYear('1990');
        $car->setKilometers('45000');
        $car->setDescription('text');
        $car->setSlug('slug');

        $this->assertTrue($car->getPrice() === '8000');
        $this->assertTrue($car->getImage() === 'file');
        $this->assertTrue($car->getYear() === '1990');
        $this->assertTrue($car->getKilometers() === '45000');
        $this->assertTrue($car->getDescription() === 'text');
        $this->assertTrue($car->getSlug() === 'slug');
    }

    public function testIsFalse()
    {
        $car = new Car();

        $car->setPrice(8000,50);
        $car->setImage('file');
        $car->setYear(1990);
        $car->setKilometers(45000);
        $car->setDescription('description');
        $car->setSlug('slug');

        $this->assertFalse($car->getPrice() === 0);
        $this->assertFalse($car->getImage() === 'false');
        $this->assertFalse($car->getYear() === 0);
        $this->assertFalse($car->getKilometers() === 0);
        $this->assertFalse($car->getDescription() === 'false');
        $this->assertFalse($car->getSlug() === 'false');
    }

    public function testIsEmpty()
    {
        $car = new Car();

        $this->assertEmpty($car->getPrice());
        $this->assertEmpty($car->getImage());
        $this->assertEmpty($car->getYear());
        $this->assertEmpty($car->getKilometers());
        $this->assertEmpty($car->getDescription());
        $this->assertEmpty($car->getSlug());
    }
}
