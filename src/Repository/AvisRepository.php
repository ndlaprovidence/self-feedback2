<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Avis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avis[]    findAll()
 * @method Avis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avis::class);
    }
    public function findAllSortedBy(String $sort): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $qb = $this->createQueryBuilder('avis')            
            ->orderBy('avis.'.$sort, 'DESC');

        $query = $qb->getQuery();

        return $query->execute();

        // to get just one result:
        // $product = $query->setMaxResults(1)->getOneOrNullResult();
    }
    public function countgout($value)
    {
        // return $this->createQueryBuilder('a')
        //     ->andWhere('a.gout = :val')
        //     ->setParameter('val', $value)
        //     ->getQuery()
        //     ->getResult()
        // ;
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT count(a.gout)
            FROM App\Entity\Avis a
            WHERE a.gout = :value'
        )->setParameter('value', $value);

        // returns an array of Product objects
        return $query->getOneOrNullResult();   
    }

    public function countdiver($value)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT count(a.diversite)
            FROM App\Entity\Avis a
            WHERE a.diversite = :value'
        )->setParameter('value', $value);
        return $query->getOneOrNullResult();   
    }
    
    public function countchaleur($value)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT count(a.chaleur)
            FROM App\Entity\Avis a
            WHERE a.chaleur = :value'
        )->setParameter('value', $value);
        return $query->getOneOrNullResult();   
    }

    public function countdispo($value)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT count(a.disponibilite)
            FROM App\Entity\Avis a
            WHERE a.disponibilite = :value'
        )->setParameter('value', $value);
        return $query->getOneOrNullResult();   
    }

    public function countpropr($value)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT count(a.proprete)
            FROM App\Entity\Avis a
            WHERE a.proprete = :value'
        )->setParameter('value', $value);
        return $query->getOneOrNullResult();   
    }

    public function countaccueil($value)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT count(a.acceuil)
            FROM App\Entity\Avis a
            WHERE a.acceuil = :value'
        )->setParameter('value', $value);
        return $query->getOneOrNullResult();   
    }
    
    // /**
    //  * @return Avis[] Returns an array of Avis objects
    //  */
    /*
    public function findByExampleField($value)
    {
            public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    }
    */

    /*
    public function findOneBySomeField($value): ?Avis
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
