<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Entity\Employee;
use App\Entity\Car;
use App\Entity\Review;
use Faker;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $passwordHasher;
        
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        $admin = new Employee();
        $employee = new Employee();

        $admin->setEmail('admin@test.com');
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin->setPassword($this->passwordHasher->hashPassword(
            $admin,
            "admin123")
        );

        $manager->persist($admin);
        
        $employee->setEmail('emp@test.com');
        $employee->setRoles(["ROLE_EMPLOYEE"]);
        $employee->setPassword($this->passwordHasher->hashPassword(
            $employee,
            "emp123")
        );
        
        $manager->persist($employee);

        for ($i = 0; $i < 10; $i++)
        {
            $car = new Car();

            $car->setPrice('8000');
            $car->setImage('file');
            $car->setYear('1990');
            $car->setKilometers('45000');
            $car->setDescription($faker->paragraph());
            $car->setSlug($faker->slug());

            $manager->persist($car);
        }

        for ($i = 0; $i < 5; $i++)
        {
            $review = new Review();

            $review->setName('name');
            $review->setBody('text');
            $review->setNote(5);
        
            $manager->persist($review);
        }

        $manager->flush();
    }
}
