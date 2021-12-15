<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    public function countgout($value, $startDate=null, $endDate=null)
    {
        // return $this->createQueryBuilder('a')
        //     ->andWhere('a.gout = :val')
        //     ->setParameter('val', $value)
        //     ->getQuery()
        //     ->getResult()
        // ;
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r.date_repas, a.gout, a.diversite, a.chaleur, a.disponibilite, a.proprete, a.acceuil, a.commentaire, count(a.gout)
            FROM App\Entity\Avis a
            INNER JOIN a.repas r
            WHERE r.date_repas > = :date_repas_start AND r.date_repas < = :date_repas_end AND a.gout = :value');
        $query->setParameter('value', $value);
        $query->setParameter('date_repas_start', $startDate);
        $query->setParameter('date_repas_end', $endDate);


        // returns an array of Product objects
        return $query->getOneOrNullResult();   
    }

    public function countdiver($value, $startDate=null, $endDate=null)
    {
        $entityManager = $this->getEntityManager();


        $query = $entityManager->createQuery(
            'SELECT r.date_repas, a.gout, a.diversite, a.chaleur, a.disponibilite, a.proprete, a.acceuil, a.commentaire, count(a.diversite)
            FROM App\Entity\Avis a
            INNER JOIN a.repas r
            WHERE r.date_repas > = :date_repas_start AND r.date_repas < = :date_repas_end AND a.diversite = :value');
        $query->setParameter('value', $value);
        $query->setParameter('date_repas_start', $startDate);
        $query->setParameter('date_repas_end', $endDate);

        return $query->getOneOrNullResult();   
    }
    
    public function countchaleur($value, $startDate=null, $endDate=null)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r.date_repas, a.gout, a.diversite, a.chaleur, a.disponibilite, a.proprete, a.acceuil, a.commentaire, count(a.chaleur)
            FROM App\Entity\Avis a
            INNER JOIN a.repas r
            WHERE r.date_repas > = :date_repas_start AND r.date_repas < = :date_repas_end AND a.chaleur = :value');
        $query->setParameter('value', $value);
        $query->setParameter('date_repas_start', $startDate);
        $query->setParameter('date_repas_end', $endDate);
        return $query->getOneOrNullResult();   
    }

    public function countdispo($value, $startDate=null, $endDate=null)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r.date_repas, a.gout, a.diversite, a.chaleur, a.disponibilite, a.proprete, a.acceuil, a.commentaire, count(a.disponibilite)
            FROM App\Entity\Avis a
            INNER JOIN a.repas r
            WHERE r.date_repas > = :date_repas_start AND r.date_repas < = :date_repas_end AND a.disponibilite = :value');
        $query->setParameter('value', $value);
        $query->setParameter('date_repas_start', $startDate);
        $query->setParameter('date_repas_end', $endDate);
        return $query->getOneOrNullResult();   
    }

    public function countpropr($value, $startDate=null, $endDate=null)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r.date_repas, a.gout, a.diversite, a.chaleur, a.disponibilite, a.proprete, a.acceuil, a.commentaire, count(a.proprete)
            FROM App\Entity\Avis a
            INNER JOIN a.repas r
            WHERE r.date_repas > = :date_repas_start AND r.date_repas < = :date_repas_end AND a.proprete = :value');
        $query->setParameter('value', $value);
        $query->setParameter('date_repas_start', $startDate);
        $query->setParameter('date_repas_end', $endDate);
        return $query->getOneOrNullResult();   
    }

    public function countaccueil($value, $startDate=null, $endDate=null)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r.date_repas, a.gout, a.diversite, a.chaleur, a.disponibilite, a.proprete, a.acceuil, a.commentaire, count(a.acceuil)
            FROM App\Entity\Avis a
            INNER JOIN a.repas r
            WHERE r.date_repas > = :date_repas_start AND r.date_repas < = :date_repas_end AND a.acceuil = :value');
        $query->setParameter('value', $value);
        $query->setParameter('date_repas_start', $startDate);
        $query->setParameter('date_repas_end', $endDate);
        return $query->getOneOrNullResult();   
    }
    public function triergout()
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT *
            FROM avis
            ORDER BY gout DESC'
        );

    }


    public function trierDate($date1, $date2)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT *
            FROM avis, repas
            WHERE avis.repas_id = repas.id
            AND repas.date_repas BETWEEN :value AND :value'
        )->setParameter('value', $date1)
         ->setParameter('value', $date2);
        return $query->getOneOrNullResult();

    }

    public function findAll()
    {
        $query = $this->createQueryBuilder('a');
        // $query->andWhere('a.gout = :val')
        // $query->setParameter('val', $value)
        return $query->getQuery()->getResult();
    }

    public function findByDates($startDate=null, $endDate=null){      
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r.date_repas, a.gout, a.diversite, a.chaleur, a.disponibilite, a.proprete, a.acceuil, a.commentaire
            FROM App\Entity\Avis a
            INNER JOIN a.repas r
            WHERE r.date_repas > = :date_repas_start AND r.date_repas < = :date_repas_end');
        $query->setParameter('date_repas_start', $startDate);
        $query->setParameter('date_repas_end', $endDate);

        return $query->getResult();
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
