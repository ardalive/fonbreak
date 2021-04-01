<?php

namespace App\Repository;

use App\Entity\Queque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Queque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Queque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Queque[]    findAll()
 * @method Queque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Queque::class);
    }

    // /**
    //  * @return Queque[] Returns an array of Queque objects
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
    public function findOneBySomeField($value): ?Queque
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
