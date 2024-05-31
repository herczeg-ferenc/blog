<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default')]
   public function index(): Response
   {
        // return hello
       return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Infrastructure/Controller/UserController.php',
            
       ]);
   }
}
