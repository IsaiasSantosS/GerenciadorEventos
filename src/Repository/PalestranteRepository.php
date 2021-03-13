<?php

namespace App\Repository;

use App\Entity\Palestrante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Palestrante|null find($id, $lockMode = null, $lockVersion = null)
 * @method Palestrante|null findOneBy(array $criteria, array $orderBy = null)
 * @method Palestrante[]    findAll()
 * @method Palestrante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PalestranteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Palestrante::class);
    }

    // /**
    //  * @return Palestrante[] Returns an array of Palestrante objects
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
    public function findOneBySomeField($value): ?Palestrante
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
