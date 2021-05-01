<?php

declare(strict_types=1);

namespace App\Controller;

use Pheature\Core\Toggle\Read\Toggle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomePage extends AbstractController
{
    public function __construct(
       private Toggle $toggle,
    ) {}

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $showCommercialName = $this->toggle->isEnabled('show_commercial_name');

        return $this->render('home/index.html.twig', [
            'show_brand_logo' => $this->toggle->isEnabled('show_brand_logo'),
            'show_home_dynamic_catalog' => $this->toggle->isEnabled('show_home_dynamic_catalog'),
            'show_contact_info' => $this->toggle->isEnabled('show_contact_info'),
            'show_commercial_name' => $showCommercialName,
            'commercial_name' => $showCommercialName ? 'My Little Friend Shop' : null,
        ]);
    }
}
    