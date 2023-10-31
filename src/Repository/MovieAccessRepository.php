<?php

namespace App\Repository;

use App\Entity\MovieAccess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MovieAccess>
 *
 * @method MovieAccess|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovieAccess|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovieAccess[]    findAll()
 * @method MovieAccess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieAccessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovieAccess::class);
    }

//    /**
//     * @return MovieAccess[] Returns an array of MovieAccess objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MovieAccess
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
