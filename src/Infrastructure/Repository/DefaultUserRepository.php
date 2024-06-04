<?php

namespace App\Infrastructure\Repository;

use App\Domain\UserRepository;
use App\Domain\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DefaultUserRepository extends ServiceEntityRepository implements UserRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function createUser(array $data): User
    {
        $dateString = date("Y-m-d H:i:s");
        $dateTimeImmutable = new \DateTimeImmutable($dateString);

        $user = new User();
        $user->setEmail($data['email']);
        $user->setName($data['name']);
        $user->setCreatedAt($dateTimeImmutable);
        $user->setUpdatedAt($dateTimeImmutable);
        $user->setAge($data['age']);

        $entityManager = $this->getEntityManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $user;
    }
}
