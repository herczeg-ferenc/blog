<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    #[Route('/user', name: 'create_user')]
    public function createUser(): Response
    {   
        $user = $this->userService->createUser([
            'email' => 'teszteremail88@gmail.com',
            'name' => 'Teszter Elek',
        ]);

        return new Response('Saved new product with id '.$user->getId());
    }
}