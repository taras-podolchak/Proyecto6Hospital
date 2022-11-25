<?php

namespace App\Repository;

use App\Entity\Emp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Emp>
 *
 * @method Emp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Emp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emp[]    findAll()
 * @method Emp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Emp::class);
    }

    public function add(Emp $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Emp $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    /*
    public function getEmpDistinOficio(): array
    {
        return $this->getEntityManager()
        ->createQuery('SELECT DISTINCT e.oficio FROM App\Entity\Emp e')
        ->getResult();
    }
*/
    public function getEmpDistinOficio(): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT e from App\Entity\Emp e GROUP BY e.oficio')
            ->getResult();
    }


    public function getEmpFromOficio(string $oficio): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT u FROM App\Entity\Emp u WHERE u.oficio LIKE :oficio')
            ->setParameter('oficio', $oficio)
            ->getResult();
    }

    public function getEmpFromEmpNo(int $empNo):  ?Emp
    {
        return $this->getEntityManager()
        ->createQuery('SELECT u FROM App\Entity\Emp u WHERE u.empNo = :empNo')
        ->setParameter('empNo', $empNo)
        ->getOneOrNullResult();
    }

    //    /**
    //     * @return Emp[] Returns an array of Emp objects
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

    //    public function findOneBySomeField($value): ?Emp
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
