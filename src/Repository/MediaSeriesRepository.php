<?php

namespace App\Repository;

use App\Entity\MediaSeries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaSeries|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaSeries|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaSeries[]    findAll()
 * @method MediaSeries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaSeriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaSeries::class);
    }

    /**
    * @return MediaSeries[] Returns an array of MediaSeries objects
    */


    /*
    public function findOneBySomeField($value): ?MediaSeries
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
