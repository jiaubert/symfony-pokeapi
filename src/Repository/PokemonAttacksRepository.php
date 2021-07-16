<?php

namespace App\Repository;

use App\Entity\PokemonAttacks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PokemonAttacks|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonAttacks|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonAttacks[]    findAll()
 * @method PokemonAttacks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonAttacksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonAttacks::class);
    }

    // /**
    //  * @return PokemonAttacks[] Returns an array of PokemonAttacks objects
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
    public function findOneBySomeField($value): ?PokemonAttacks
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
