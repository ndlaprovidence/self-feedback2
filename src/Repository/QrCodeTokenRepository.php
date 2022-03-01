<?php

namespace App\Repository;

use App\Entity\QrCodeToken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QrCodeToken|null find($id, $lockMode = null, $lockVersion = null)
 * @method QrCodeToken|null findOneBy(array $criteria, array $orderBy = null)
 * @method QrCodeToken[]    findAll()
 * @method QrCodeToken[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QrCodeTokenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QrCodeToken::class);
    }

    
    public function tokenExist($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.date = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    public function tokenVerify($date)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.date = :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    // /**
    //  * @return QrCodeToken[] Returns an array of QrCodeToken objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QrCodeToken
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
