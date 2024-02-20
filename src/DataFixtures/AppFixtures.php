<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Entity\Employee;
use App\Entity\Car;
use App\Entity\Review;
use App\Entity\Service;
use App\Entity\ContactMessage;
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

        for ($i = 0; $i < 50; $i++)
        {
            $car = new Car();

            $car->setTitle($faker->sentence($nbWords = 6));
            $car->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1000000));
            $car->setImage('file');
            $car->setYear($faker->year($max = 'now'));
            $car->setKilometers($faker->numberBetween($min = 0, $max = 500000));
            $car->setDescription($faker->paragraph());
            $car->setSlug($faker->slug(1));

            $manager->persist($car);
        }

        for ($i = 0; $i < 10; $i++)
        {
            $review = new Review();

            $review->setName($faker->firstName());
            $review->setBody($faker->paragraph());
            $review->setNote($faker->numberBetween($min = 1, $max = 5));
            $review->setStatus($faker->randomElement($array = array ('pending','denied','approved')));
        
            $manager->persist($review);
        }

        for ($i = 0; $i < 6; $i++)
        {
            $service = new Service();

            $service->setName($faker->word);
            $service->setDescription($faker->sentence($nbWords = 5));
        
            $manager->persist($service);
        }

        for ($i = 0; $i < 10; $i++)
        {
            $contactMessage = new ContactMessage();

            $contactMessage->setFirstName($faker->firstName());
            $contactMessage->setLastName($faker->lastName());
            $contactMessage->setEmail($faker->email());
            $contactMessage->setPhoneNumber('+3300000000');
            $contactMessage->setBody($faker->paragraph());
            
            $manager->persist($contactMessage);
        }

        $manager->flush();
    }
}
