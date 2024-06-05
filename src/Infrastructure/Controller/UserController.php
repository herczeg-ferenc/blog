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
            'age' => (int)$request->query->get('age', '18'),
        ]);
        
        $errors = [];
        if(empty($user->getName()) || !preg_match("/^[a-zA-Z\s]+$/", $user->getName())) {
            $errors[] = "Valid username is required.";
        }
        if(empty($user->getEmail()) || !filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
           $errors[] = "Valid email is required.";
        }
        
        if(empty($user->getAge()) || !filter_var($user->getAge(), FILTER_VALIDATE_INT)){
            $errors[] = "Age must be a valid integer.";
        }
        
        // If there are validation errors, display them to the user
        if(!empty($errors)) {
            foreach($errors as $error) {
                echo $error . "<br>";
            }
            return new Response('Cant save'); // Display error message
        } else {
            return new Response('Saved new product with id '.$user->getId()); // Or do whatever you want upon successful validation
        }
        //return new Response('Saved new product with id '.$user->getId());
    }

    
}