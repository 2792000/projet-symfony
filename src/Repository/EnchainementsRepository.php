<?php

namespace App\Repository;

use App\Entity\Enchainements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Enchainements>
 *
 * @method Enchainements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enchainements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enchainements[]    findAll()
 * @method Enchainements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnchainementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enchainements::class);
    }

//    /**
//     * @return Enchainements[] Returns an array of Enchainements objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Enchainements
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
