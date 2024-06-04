<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    #[Route('/user', name: 'create_user')]
    public function createUser(Request $request): Response    
    {   
        
        $user = $this->userService->createUser([
            'email' => $request->query->get('email', 'teszmail@gmail.com'),
            'name' => $request->query->get('name', 'Teszt'),
            'age' => $request->query->get('age', '18'),
        ]);

        return new Response('Saved new product with id '.$user->getId());
    }

    
}