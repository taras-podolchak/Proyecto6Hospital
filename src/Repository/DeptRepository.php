<?php

namespace App\Repository;

use App\Entity\Dept;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\Cast\String_;

/**
 * @extends ServiceEntityRepository<Dept>
 *
 * @method Dept|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dept|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dept[]    findAll()
 * @method Dept[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dept::class);
    }

    public function add(Dept $entity/*, bool $flush = false*/): void
    {
        $this->getEntityManager()->persist($entity);

        //  if ($flush) {
        $this->getEntityManager()->flush();
        // }
    }

    public function remove(Dept $entity/*, bool $flush = false*/): void
    {
        $this->getEntityManager()->remove($entity);

        // if ($flush) {
        $this->getEntityManager()->flush();
        // }
    }

    public function getDepWhereIdMas10(): array
    {
        return $this->getEntityManager()
        ->createQuery('SELECT u FROM App\Entity\Dept u WHERE u.id > 10')
        ->getResult();
    }

    public function getDepFromName(string $nombre): array
    {
        return $this->getEntityManager()
        ->createQuery('SELECT u FROM App\Entity\Dept u WHERE u.dnombre = :nombre')
        ->setParameter('nombre', $nombre)
        ->getResult();
    }

    public function getDepFromChar(string $char): array
    {
        return $this->getEntityManager()
        ->createQuery('SELECT u FROM App\Entity\Dept u WHERE u.dnombre LIKE :charac')
        ->setParameter('charac', "$char%")
        ->getResult();
    }

    //    /**
    //     * @return Dept[] Returns an array of Dept objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Dept
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
