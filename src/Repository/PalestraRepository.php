<?php

namespace App\Repository;

use App\Entity\Palestra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Palestra|null find($id, $lockMode = null, $lockVersion = null)
 * @method Palestra|null findOneBy(array $criteria, array $orderBy = null)
 * @method Palestra[]    findAll()
 * @method Palestra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PalestraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Palestra::class);
    }

    // /**
    //  * @return Palestra[] Returns an array of Palestra objects
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
    public function findOneBySomeField($value): ?Palestra
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
