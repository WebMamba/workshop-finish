<?php

namespace App\Repository;

use App\Entity\Radio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Radio>
 *
 * @method Radio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Radio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Radio[]    findAll()
 * @method Radio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RadioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Radio::class);
    }

    public function search(string $search): array
    {
        return $this->createQueryBuilder('radio')
            ->andWhere('radio.types LIKE :genre OR radio.name LIKE :name')
            ->setParameter('genre', "%$search%")
            ->setParameter('name', "%$search%")
            ->getQuery()
            ->getResult()
            ;
    }
}
