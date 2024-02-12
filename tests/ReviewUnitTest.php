<?php

namespace App\Tests;

use App\Entity\Review;
use PHPUnit\Framework\TestCase;

class ReviewUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $review = new Review();

        $review->setName('name');
        $review->setBody('text');
        $review->setNote('5');

        $this->assertTrue($review->getName() === 'name');
        $this->assertTrue($review->getBody() === 'text');
        $this->assertTrue($review->getNote() === '5');
    }

    public function testIsFalse()
    {
        $review = new Review();

        $review->setName('name');
        $review->setBody('text');
        $review->setNote('5');

        $this->assertFalse($review->getName() === 'false');
        $this->assertFalse($review->getBody() === 'false');
        $this->assertFalse($review->getNote() === '0');
    }

    public function testIsEmpty()
    {
        $review = new Review();

        $this->assertEmpty($review->getName());
        $this->assertEmpty($review->getBody());
        $this->assertEmpty($review->getNote());
    }
}
