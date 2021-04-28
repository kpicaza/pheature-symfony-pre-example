<?php

declare(strict_types=1);

namespace App\Controller;

use Pheature\Core\Toggle\Read\Toggle;
use Pheature\Model\Toggle\Identity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomePage extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', []);
    }
}
    