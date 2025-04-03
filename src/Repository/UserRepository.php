<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements UserLoaderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function loadUserByIdentifier(string $identifier): ?UserInterface
    {
        return $this->findInternal([
                'pseudo' => $identifier,
            ])
            ->getQuery()
            ->setFirstResult(0)
            ->getOneOrNullResult()
        ;
    }

    protected function findInternal($params = []): QueryBuilder
    {
        $queryParams = [];

        $query = $this->createQueryBuilder('u');

        if (isset($params['id'])) {
            $query->andWhere('u.id = :id')
                ->setParameter('id', $params['id'])
            ;
        }

        if (isset($params['pseudo'])) {
            $query->andWhere('u.pseudo = :pseudo')
                ->setParameter('pseudo', $params['pseudo'])
            ;
        }

        if (isset($params['email'])) {
            $query->andWhere('u.email = :email')
                ->setParameter('email', $params['email'])
            ;
        }

        return $query
            //->leftJoin('c.clients', 'uc')
            //->leftJoin('u.language', 'l')
            ->addSelect('u') // example: 'u, c, uc, l'
        ;
    }
}
