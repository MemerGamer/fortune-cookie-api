<?php

namespace App\Repository;

use App\Entity\Fortune;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fortune>
 */
class FortuneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fortune::class);
    }

    public function getRandomFortune(): ?Fortune
    {
        $id_fortunes = $this->createQueryBuilder('fortune')
            ->select('MIN(fortune.id) as min, MAX(fortune.id) as max')
            ->getQuery()
            ->getOneOrNullResult();

        $random_possible_id = rand($id_fortunes['min'], $id_fortunes['max']);

        return $this->createQueryBuilder('fortune')
            ->where('fortune.id >= :id')
            ->setParameter('id', $random_possible_id)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
