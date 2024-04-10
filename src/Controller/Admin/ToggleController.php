<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Pheature\Core\Toggle\Read\FeatureFinder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ToggleController extends DashboardController
{
    private FeatureFinder $featureFinder;

    public function __construct(FeatureFinder $featureFinder)
    {
        $this->featureFinder = $featureFinder;
    }

    #[Route(path: '/admin/features', name: 'admin_features')]
    public function index(): Response
    {
        $features = $this->featureFinder->all();

        return $this->render('pheature/dashboard.html.twig', [
            'features' => $features,
        ]);
    }
}
    