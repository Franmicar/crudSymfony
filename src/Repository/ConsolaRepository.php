<?php

namespace App\Repository;

use App\Entity\Consola;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Consola|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consola|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consola[]    findAll()
 * @method Consola[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsolaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consola::class);
    }

    public function countAll()
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    // /**
    //  * @return Consola[] Returns an array of Consola objects
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
    public function findOneBySomeField($value): ?Consola
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
