<?php

namespace App\Repository;

use App\Entity\TypesRepas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypesRepas|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesRepas|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesRepas[]    findAll()
 * @method TypesRepas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesRepasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesRepas::class);
    }

    // /**
    //  * @return TypesRepas[] Returns an array of TypesRepas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypesRepas
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
