<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

//    /**
//     * @return Car[] Returns an array of Car objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

   public function findOneBySomeField(string $slug): ?Car
   {
        // dd($slug);
       return $this->createQueryBuilder('c')
           ->where('c.slug = :slug')
           ->setParameter('slug', $slug)
           ->getQuery()
           ->getOneOrNullResult()
       ;
   }

    /**
    * @return Car[] Returns last ten Car objects
    */
    public function findLastTen()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Car Returns Car object with max kilometers
    */
    public function highestKm()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.kilometers + 0', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Car Returns Car object with max kilometers
    */
    public function lowestKm()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.kilometers + 0', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

}
