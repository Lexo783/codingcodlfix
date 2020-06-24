<?php

namespace App\Repository;

use App\Entity\MediaMovie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaMovie|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaMovie|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaMovie[]    findAll()
 * @method MediaMovie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaMovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaMovie::class);
    }

    // /**
    //  * @return MediaMovie[] Returns an array of MediaMovie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MediaMovie
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
