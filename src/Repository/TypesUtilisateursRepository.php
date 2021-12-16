<?php

namespace App\Repository;

use App\Entity\TypesUtilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypesUtilisateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesUtilisateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesUtilisateurs[]    findAll()
 * @method TypesUtilisateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesUtilisateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesUtilisateurs::class);
    }

    /**
     * @return TypesUtilisateurs[] Returns an array of TypesUtilisateurs objects
     * @return TypesRepas[]
     */
    public function findOneById($id)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    

    /*
    public function findOneBySomeField($value): ?TypesUtilisateurs
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
