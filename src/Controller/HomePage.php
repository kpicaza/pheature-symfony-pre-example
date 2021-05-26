<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;
use Pheature\Core\Toggle\Read\Toggle;
use Pheature\Model\Toggle\Identity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomePage extends AbstractController
{
    public function __construct(
        private Toggle $toggle,
        private ProductRepository $productRepository,
    ) {}

    #[Route('/', name: 'homepage')]
    public function index(Request $request): Response
    {
        $showCommercialName = $this->toggle->isEnabled('show_commercial_name');
        $showDynamicCatalog = $this->toggle->isEnabled('show_home_dynamic_catalog', new Identity('anon', [
            $request->query->get('role')
        ]));

        return $this->render('home/index.html.twig', [
            'show_brand_logo' => $this->toggle->isEnabled('show_brand_logo'),
            'show_home_dynamic_catalog' => $showDynamicCatalog,
            'catalog' => $this->getCatalog($showCommercialName),
            'show_contact_info' => $this->toggle->isEnabled('show_contact_info'),
            'show_commercial_name' => $showCommercialName,
            'commercial_name' => $showCommercialName ? 'My Little Friend Shop' : null,
        ]);
    }

    private function getCatalog(bool $showCommercialName): array
    {
        return $showCommercialName
            ? $this->productRepository->findAll()
            : [];
    }
}
    