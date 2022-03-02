<?php

namespace App\Repository;

use App\Entity\PinQRcode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PinQRcode|null find($id, $lockMode = null, $lockVersion = null)
 * @method PinQRcode|null findOneBy(array $criteria, array $orderBy = null)
 * @method PinQRcode[]    findAll()
 * @method PinQRcode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PinQRcodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PinQRcode::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PinQRcode $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(PinQRcode $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function searchPin($value): ?PinQRcode
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.pin = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // /**
    //  * @return PinQRcode[] Returns an array of PinQRcode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PinQRcode
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
