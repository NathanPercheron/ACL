<?php

namespace App\Repository;

use App\Entity\DateCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DateCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateCours[]    findAll()
 * @method DateCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateCoursRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DateCours::class);
    }

    // /**
    //  * @return DateCours[] Returns an array of DateCours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateCours
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
