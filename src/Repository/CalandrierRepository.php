<?php

namespace App\Repository;

use App\Entity\Calandrier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Calandrier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calandrier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calandrier[]    findAll()
 * @method Calandrier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalandrierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Calandrier::class);
    }

    // /**
    //  * @return Calandrier[] Returns an array of Calandrier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Calandrier
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
