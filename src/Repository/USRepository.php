<?php

namespace App\Repository;

use App\Entity\US;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method US|null find($id, $lockMode = null, $lockVersion = null)
 * @method US|null findOneBy(array $criteria, array $orderBy = null)
 * @method US[]    findAll()
 * @method US[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class USRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, US::class);
    }

    // /**
    //  * @return US[] Returns an array of US objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?US
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
