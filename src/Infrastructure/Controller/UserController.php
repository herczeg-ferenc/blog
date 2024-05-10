<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

// ...
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Domain\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use DateTimeImmutable;

class UserController extends AbstractController
{
    #[Route('/user', name: 'create_user')]
    public function createUser(EntityManagerInterface $entityManager): Response
    {   
        $dateString = date("Y-m-d H:i:s");
        $dateTimeImmutable = new DateTimeImmutable($dateString);

        $user = new User();
        $user->getid(001);
        $user->setEmail('teszteremail88@gmail.com');
        $user->setName('Teszt Lajos');
        $user->setCreatedAt($dateTimeImmutable);
        $user->setUpdatedAt($dateTimeImmutable);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$user->getId());
    }
}