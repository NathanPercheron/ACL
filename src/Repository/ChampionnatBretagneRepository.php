<?php

namespace App\Repository;

use App\Entity\ChampionnatBretagne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChampionnatBretagne|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampionnatBretagne|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampionnatBretagne[]    findAll()
 * @method ChampionnatBretagne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampionnatBretagneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChampionnatBretagne::class);
    }

    // /**
    //  * @return ChampionnatBretagne[] Returns an array of ChampionnatBretagne objects
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
    public function findOneBySomeField($value): ?ChampionnatBretagne
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
